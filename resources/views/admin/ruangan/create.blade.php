@extends('layouts.app')
@section('header','ruangan')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Create ruangan</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <form action="/ruangans" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="">Name ruangan</label>
            <input type="test" required name="nama_ruangan" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" required name="desc_ruangan" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Kondisi ruangan</label>
            <select name="perbaikan" id="" required class="form-control">
                <option value="" selected>~~ Select Your Kondisi ruangan ~~</option>
                <option value="1">Diperbaiki</option>
                <option value="0">Bisa digunakan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Foto Ruangan</label>
            <input type="file" name="file" id="" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary btn-md">Create</button>

    </form>
@endsection