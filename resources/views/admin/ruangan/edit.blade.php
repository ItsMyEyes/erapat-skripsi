@extends('layouts.app')
@section('header','ruangan')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Create ruangan</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <form action="/ruangans/{{$data->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method("PUT")
        <div class="form-group">
            <label for="">Name ruangan</label>
            <input type="test" required name="nama_ruangan" value="{{$data->nama_ruangan}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" required name="desc_ruangan" value="{{$data->desc_ruangan}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Kondisi ruangan</label>
            <select name="perbaikan" id="" required class="form-control">
                <option value="" selected>~~ Select Your Kondisi ruangan ~~</option>
                <option value="1" {{ $data->perbaikan == 1 ? 'selected' : '' }}>Diperbaiki</option>
                <option value="0" {{ $data->perbaikan == 0 ? 'selected' : '' }}>Bisa digunakan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Foto Ruangan</label> <br>
            <img src="{{$data->file}}" height="50" width="50" alt="">
            <input type="file" name="file" id="" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary btn-md">Create</button>

    </form>
@endsection