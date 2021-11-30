<?php

namespace App\Http\Controllers;

use App\Models\listRapat;
use Illuminate\Http\Request;

class ListRapatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d H:i:s');
        $now = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');;
        $z = listRapat::all();
        $ini['hasil'] = false;
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
                }
            }
        } else {
            $data = [];
        }
        return view('admin.agenda.index',compact('data','ini'));
    }

    public function filterDate(Request $request)
    {
        $date = date('Y-m-d H:i:s',strtotime($request->date));
        $now = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');;
        $z = listRapat::all();
        $ini['hasil'] = false;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \App\Models\User::where('role','peserta')->orWhere('role','panitia')->get();
        $ruangan = \App\Models\ruangan::where('digunakan', 0)->where('perbaikan',0)->get();
        return view('admin.agenda.create', compact('user','ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'start' => 'required',
            'ruangan' => 'required',
            'selesai' => 'required',
            'type' => 'required',
            'desc' => 'required',
            'jangka_waktu' => 'required',
            'frekuensi_rapat' => 'required'
        ]);

        $ruanganList =  \App\Models\listRapat::where('ruangan', $request->ruangan)->where('diselesaikan','nope')->get();
        $error = [];
        if (isset($request->selesai) && !is_null($request->selesai)) {
            if (strtotime($request->start) >= strtotime($request->selesai)) {
                $error[] = true;
            }
        }
        if (count($ruanganList) > 0) {
            foreach ($ruanganList as $key => $value) {
                if (date('Ymd', strtotime($request->start)) == date('Ymd', strtotime($value->start))) {
                    if ($value->selesai !== "nope") {
                        if (strtotime($request->start) >= strtotime($value->start) || strtotime($request->selesai) <= strtotime($value->selesai)) {
                            $error[] = true;
                        }
                    } else {
                        if (strtotime($request->start) >= strtotime($value->start)) {
                            $error[] = true;
                        }
                    }
                }
            }
        }

        if (in_array(true, $error)) {
            \Session::flash('failed','Ruangan sedang digunakan pada jam tersebut');
            return back();
        }

        $data = \App\Models\listRapat::create([
            'judul' => $request->judul,
            'start' => $request->start,
            'selesai' => $request->selesai ?: "nope",
            'diselesaikan' => "nope",
            'desc' => $request->desc,
            'ruangan' => $request->ruangan,
            'link_rapat' => $request->link_rapat,
            'type_rapat' => $request->type,
            'jangka_waktu' => $request->jangka_waktu,
            'frekuensi_rapat' => $request->frekuensi_rapat,

        ]);

        if ($request->type == 'tertutup') {
            if (isset($request->peserta) && !is_null($request->peserta)) {
                foreach ($request->peserta as $key => $value) {
                    \App\Models\listPeserta::create([
                        'id_rapat' => $data->id,
                        'id_peserta' => $value,
                     ]);
                }
            } else {
                \Session::flash('failed','Tolong pilih peserta dikarenakan rapat tertup');
                return back();
            }
        }

        
        \Session::flash('success','Success to add agenda and broadcast to all peserta');
        return redirect('/agendas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\listRapat  $listRapat
     * @return \Illuminate\Http\Response
     */
    public function show(listRapat $listRapat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\listRapat  $listRapat
     * @return \Illuminate\Http\Response
     */
    public function edit($listRapat)
    {
        $user = \App\Models\User::where('role','peserta')->orWhere('role','panitia')->get();
        $ruangan = \App\Models\ruangan::where('perbaikan', 0)->get();
        $data = listRapat::find($listRapat);
        $dataUserId = Array();
        foreach ($user as $value) { $dataUserId[] = $value->id; }
        foreach ($data->peserta as $key => $v) { 
            if (in_array($v->id_peserta, $dataUserId)) {
                $user[$key]['selected'] = true;
            }
        }
        return view('admin.agenda.edit',compact('data','ruangan','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\listRapat  $listRapat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $listRapat)
    {
        $this->validate($request, [
            'judul' => 'required',
            'start' => 'required',
            'selesai' => 'required',
            'ruangan' => 'required',
            'type' => 'required',
            'desc' => 'required',
            'jangka_waktu' => 'required',
            'frekuensi_rapat' => 'required'
        ]);

        $data = \App\Models\listRapat::find($listRapat);
        $ruanganList =  \App\Models\listRapat::where('ruangan', $request->ruangan)->where('diselesaikan','nope')->whereNull('diselesaikan')->where('id','!=',$listRapat)->get();
        $error = [];
        if (isset($request->selesai) && !is_null($request->selesai)) {
            if (strtotime($request->start) >= strtotime($request->selesai)) {
                $error[] = true;
            }
        }
        if (count($ruanganList) > 0) {
            foreach ($ruanganList as $key => $value) {
                if (date('Ymd', strtotime($request->start)) == date('Ymd', strtotime($value->start))) {
                    if ($value->selesai !== "nope") {
                        if (strtotime($request->start) >= strtotime($value->start) || strtotime($request->selesai) <= strtotime($value->selesai)) {
                            $error[] = true;
                        }
                    } else {
                        if (strtotime($request->start) >= strtotime($value->start)) {
                            $error[] = true;
                        }
                    }
                }
            }
        }

        if (in_array(true, $error)) {
            \Session::flash('failed','Ruangan sedang digunakan pada jam tersebut');
            return back();
        }

        if ($request->type == 'tertutup') {
            if (count($request->peserta) > 0) {
                foreach ($data->peserta as $pesDel) { $pesDel->delete(); }
                foreach ($request->peserta as $key => $value) {
                    \App\Models\listPeserta::create([
                        'id_rapat' => $data->id,
                        'id_peserta' => $value,
                    ]);
                }
            } else {
                \Session::flash('failed','Tolong pilih peserta dikarenakan rapat tertup');
                return back();
            }
        }

        $data->update([
            'judul' => $request->judul,
            'start' => $request->start,
            'selesai' => $request->selesai ?: "nope",
            'diselesaikan' => "nope",
            'desc' => $request->desc,
            'ruangan' => $request->ruangan,
            'link_rapat' => $request->link_rapat,
            'type_rapat' => $request->type,
            'jangka_waktu' => $request->jangka_waktu,
            'frekuensi_rapat' => $request->frekuensi_rapat,
        ]);
        \Session::flash('success','Success to update agenda and broadcast to all peserta');
        return redirect('/agendas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\listRapat  $listRapat
     * @return \Illuminate\Http\Response
     */
    public function destroy($listRapat)
    {
        $data = listRapat::find($listRapat);
        foreach ($data->peserta as $v) {
            \App\Models\listPeserta::where('id_peserta', $v->id_peserta)->delete();
        }
        if (!is_null($data->ruangan)) {
            \App\Models\ruangan::find($data->ruangan)->update([
                'digunakan' => 0
            ]);
        }
        $data->delete();
        return 'success';
    }
}
