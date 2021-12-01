<?php

namespace App\Http\Controllers;

use App\Models\ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ruangan::all();
        foreach ($data as $key => $value) {
            $nope = \App\Models\listRapat::where('selesai','nope')->where('ruangan',$value->id)->first();
            $data[$key]['nama_ruangan'] = $value->nama_ruangan;
            $data[$key]['id'] = $value->id;
            $data[$key]['perbaikan'] = ($value->perbaikan == 1) ?  "Sedang diperbaiki" : "Boleh digunakan";
            $data[$key]['id_rapat'] = (isset($nope) && !is_null($nope)) ? $nope->id : ""; 
        }
        return view('admin.ruangan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ruangan.create');
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
            'nama_ruangan' => 'required',
            'desc_ruangan' => 'required',
        ]);

        $path = "/no-image.jpg";
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_filez = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
            $file->move('/home/simrxyz/public_html/images/',$nama_filez);
            $path =  "/images/".md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        }


        ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'desc_ruangan' => $request->desc_ruangan,
            'digunakan' => $request->perbaikan,
            'file' => $path,
        ]);
        \Session::flash('success','Success to add ruangan');
        return redirect('/ruangans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit($ruangan)
    {
        $data = ruangan::find($ruangan);
        return view('admin.ruangan.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ruangan)
    {
        $this->validate($request, [
            'nama_ruangan' => 'required',
            'desc_ruangan' => 'required',
        ]);

        $up = ruangan::find($ruangan);

        $path = $up->file;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_filez = md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
            $file->move('/home/simrxyz/public_html/images/',$nama_filez);
            $path =  "/images/".md5($file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        }

        $up->update([
            'nama_ruangan' => $request->nama_ruangan,
            'desc_ruangan' => $request->desc_ruangan,
            'digunakan' => $request->perbaikan,
            'file' => $path,
        ]);
        \Session::flash('success','Success to update ruangan');
        return redirect('/ruangans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($ruangan)
    {
        ruangan::find($ruangan)->delete();
        return 'success';
    }
}
