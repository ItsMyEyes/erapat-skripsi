<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = about::first();
        return view('admin.about.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'description' => 'required'
        ]);

        $noDuplicate = about::count();
        if ($noDuplicate > 0) {
            \Session::flash('error','Duplicate setting about');
        } else {
            about::create($request->all());
            \Session::flash('success','Success create setting about');
        }
        return redirect()->to('abouts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($about)
    {
        $data = about::find($about);
        return view('admin.about.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $about)
    {
        $this->validate($request, [
            'judul' => 'required',
            'description' => 'required'
        ]);

        about::find($about)->update($request->all());
        \Session::flash('success','Success create setting about');
        return redirect('/abouts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($about)
    {
        about::find($about)->delete();
        \Session::flash('success','Success create setting about');
        return redirect('/abouts');
    }
}
