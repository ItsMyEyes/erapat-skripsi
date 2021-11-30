@extends('layouts.app')
@section('header','About')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Edit About</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <form action="/abouts/{{$data->id}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method("PUT")
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" value="{{ $data->judul }}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" cols="30" rows="10" class="form-control">{!! $data->description !!}</textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-md">Edit</button>

    </form>
@endsection