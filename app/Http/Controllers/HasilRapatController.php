<?php

namespace App\Http\Controllers;

use App\Models\hasilRapat;
use App\Models\listRapat;
use Illuminate\Http\Request;

class HasilRapatController extends Controller
{
    public function fetchAll()
    {
        $date = date('Y-m-d H:i:s');
        $hasil = true;
        $now = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');;
        $z = listRapat::all();
        $ini['hasil'] = true;
        $data = Array();
        if (count($z) > 0) {
            foreach ($z as $key => $value) {
                if ($value->created_at->format('Y-m-d') == $now) {
                    $data[$key]['id'] = $value->id;
                    $data[$key]['nama'] = $value->judul;
                    $data[$key]['desc'] = $value->desc;
                    $data[$key]['start'] = date("d-m-Y H:i:s", strtotime($value->start));
                    $data[$key]['selesai'] = $value->selesai == "nope" ? "belum selesai" : date("d-m-Y H:i:s", strtotime($value->selesai));
                    $data[$key]['jumlah_peserta'] = $value->peserta->count();
                    $data[$key]['nama_tempat'] = (isset($value->ruanganDetail) && !is_null($value->ruanganDetail)) ? $value->ruanganDetail->nama_ruangan : $value->link_rapat;
                    $data[$key]['hasil_rapat'] = (isset($value->hasilRapat) && !is_null($value->hasilRapat)) ? true : false;
                    $data[$key]['hasil'] = true;
                }
            }
        } else {
            $data = [];
        }
        return view('admin.agenda.index',compact('data','ini','hasil'));
    }

    public function filterDate(Request $request)
    {
        $date = date('Y-m-d H:i:s',strtotime($request->date));
        $now = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');;
        $z = listRapat::all();
        $ini['hasil'] = true;
        $data = Array();
        if (count($z) > 0) {
            foreach ($z as $key => $value) {
                if ($value->created_at->format('Y-m-d') == $now) {
                    $data[$key]['id'] = $value->id;
                    $data[$key]['nama'] = $value->judul;
                    $data[$key]['desc'] = $value->desc;
                    $data[$key]['start'] = date("d-m-Y H:i:s", strtotime($value->start));
                    $data[$key]['selesai'] = $value->selesai == "nope" ? "belum selesai" : date("d-m-Y H:i:s", strtotime($value->selesai));
                    $data[$key]['jumlah_peserta'] = $value->peserta->count();
                    $data[$key]['nama_tempat'] = (isset($value->ruanganDetail) && !is_null($value->ruanganDetail)) ? $value->ruanganDetail->nama_ruangan : $value->link_rapat;
                    $data[$key]['hasil_rapat'] = (isset($value->hasilRapat) && !is_null($value->hasilRapat)) ? true : false;
                    $data[$key]['hasil'] = true;
                }
            }
        } else {
            $data = [];
        }
        return view('admin.agenda.index',compact('data','ini'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = \App\Models\listRapat::find($id);
        return view('admin.agenda.hasil.detail', compact('data'));
    }

    public function presensi($id)
    {
        $data = \App\Models\listRapat::find($id);
        return view('admin.agenda.hasil.presensi', compact('data'));
    }

    public function selesai($id)
    {
        $data = \App\Models\listRapat::find($id);
        if (!isset($data) && is_null($data)) {
            return back('/dashboard');
        }
        return view('admin.agenda.hasil.create', compact('data'));
    }

    public function selesaikan(Request $request, $id)
    {
        $this->validate($request, [
            'uraian' => 'required',
            'perhatian' => 'required',
            'files.*' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = \App\Models\listRapat::find($id);
        $now = \Carbon\Carbon::now();
        if ($data->ruangan != 0) {
            \App\Models\ruangan::find($data->ruangan)->update([
                'digunakan' => 0
            ]);
        }
        $data->update([
            'diselesaikan' => $now
        ]);
        \App\Models\hasilRapat::create([
            'id_rapat' => $data->id,
            'uraian' => $request->uraian,
            'perhatian' => $request->perhatian,
        ]);

        if($request->hasfile('files'))
        {
           foreach($request->file('files') as $key => $file)
           {
                $nama_filez = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
                $file->move('/home/simrxyz/public_html/images/',$nama_filez);
                $path =  "/images/".md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();

                \App\Models\dokumentasi::create([
                    'id_rapat' => $data->id,
                    'file' => $path
                ]);
           }
        }

        \Session::flash('success','Success end rapat');
        return redirect('hasil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hasilRapat  $hasilRapat
     * @return \Illuminate\Http\Response
     */
    public function show(hasilRapat $hasilRapat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hasilRapat  $hasilRapat
     * @return \Illuminate\Http\Response
     */
    public function edit(hasilRapat $hasilRapat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hasilRapat  $hasilRapat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hasilRapat $hasilRapat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hasilRapat  $hasilRapat
     * @return \Illuminate\Http\Response
     */
    public function destroy(hasilRapat $hasilRapat)
    {
        //
    }
}
