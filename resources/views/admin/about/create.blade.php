@extends('layouts.app')
@section('header','About')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Create About</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <form action="/abouts" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-md">Create</button>

    </form>
@endsection