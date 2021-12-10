<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $rapatTerbuka = \App\Models\listRapat::where('type_rapat', 'terbuka')->where('diselesaikan','nope')->orderBy('start','ASC')->get();
        $rapatSelf = \App\Models\listRapat::whereHas('peserta', function ($q)
        {
            $q->where('id_peserta', auth()->user()->id)->where('kehadiran',1);
        })->where('diselesaikan','nope')->orderBy('start','ASC')->get();
        $rapatSendiri = \App\Models\listRapat::whereHas('peserta', function ($q)
        {
            $q->where('id_peserta', auth()->user()->id)->where('kehadiran',0);
        })->where('diselesaikan','nope')->where('type_rapat','!=','terbuka')->orderBy('start','ASC')->get();
        return view('peserta',compact('rapatSelf','rapatTerbuka','rapatSendiri'));
    }

    public function hasilRapat(Request $request)
    {
        $z = \App\Models\listRapat::whereHas('peserta', function ($q)
        {
            $q->where('id_peserta', auth()->user()->id)->where('kehadiran',1);
        })->where('diselesaikan','!=','nope')->orderBy('start','ASC')->get();
        $iniReq = $request->date ?: "now";
        $date = strtotime($iniReq);
        $rapatSelf = Array();
        if (count($z) > 0) {
            foreach ($z as $key => $value) {
                // if (date('Ymd', strtotime($value->start)) == date('Ymd', $date)) {
                    $rapatSelf[$key]['id'] = $value->id;
                    $rapatSelf[$key]['nama'] = $value->judul;
                    $rapatSelf[$key]['desc'] = $value->desc;
                    $rapatSelf[$key]['start'] = date("d-m-Y H:i:s", strtotime($value->start));
                    $rapatSelf[$key]['type'] = $value->getTypeRapat();
                    $rapatSelf[$key]['image'] = isset($value->ruanganDetail) && !is_null($value->ruanganDetail) ? $value->ruanganDetail->file : null;
                    $rapatSelf[$key]['selesai'] = $value->diselesaikan == "nope" ? "belum selesai" : date("d-m-Y H:i:s", strtotime($value->selesai));
                    $rapatSelf[$key]['jumlah_peserta'] = $value->peserta->count();
                    $rapatSelf[$key]['nama_tempat'] = (isset($value->ruanganDetail) && !is_null($value->ruanganDetail)) ? $value->ruanganDetail->nama_ruangan : $value->link_rapat;
                    $rapatSelf[$key]['hasil_rapat'] = (isset($value->hasilRapat) && !is_null($value->hasilRapat)) ? true : false;
                // }
            }
        }

        return view('hasil',compact('rapatSelf'));
    }

    public function detail($kampret)
    {
        $id = urlencode(base64_decode(base64_decode($kampret)));
        $rapatSelf = \App\Models\listRapat::find($id);
        $modelListPeserta = \App\Models\listPeserta::where('id_rapat',$id)->where('id_peserta',auth()->user()->id)->where('kehadiran','1')->first();
        $hadir =  isset($modelListPeserta) && !is_null($modelListPeserta) ? true : false;
        return view('pesertaDetail',compact('rapatSelf','kampret','hadir'));
    }

    public function hadir(Request $request, $id)
    {
        $id = urlencode(base64_decode(base64_decode($id)));
        $rapatSelf = \App\Models\listRapat::whereHas('peserta', function ($q)
        {
            $q->where('id_peserta', auth()->user()->id);
        })->where('id',$id)->first();
        $path = "/no-image.jpg";
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_filez = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
            $file->move('/home/simrxyz/public_html/images/',$nama_filez);
            $path =  "/images/".md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        }
        if (isset($rapatSelf) && !is_null($rapatSelf)) {
            \App\Models\listPeserta::where('id_rapat',$id)->where('id_peserta',auth()->user()->id)->update([
                'kehadiran' => '1',
                'url' => $path
            ]);
        } else {
            \App\Models\listPeserta::updateorCreate([
                'id_rapat' => $id,
                'id_peserta' => auth()->user()->id,
                'kehadiran' => '1',
                'url' => $path
            ]);
        }
        \Session::flash('success','Success Absen');
        return back();
    }

    public function notulen($kampret)
    {
        $id = urldecode(base64_decode(base64_decode($kampret)));
        $rapatSelf = \App\Models\hasilRapat::where('id_rapat',$id)->first();
        return view('detailNotulen',compact('rapatSelf','kampret'));
    }

    public function cetak($kampret)
    {
        $id = urldecode(base64_decode(base64_decode($kampret)));
        $rapatSelf = \App\Models\hasilRapat::where('id_rapat',$id)->first();
        return view('cetak',compact('rapatSelf','kampret'));
    }
}