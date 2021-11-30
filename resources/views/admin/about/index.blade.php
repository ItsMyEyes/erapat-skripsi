@extends('layouts.app')
@section('header','About')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Data About</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="row">
    <div class="col-xs-12">
        <div class="pull-right">
            <a href="{{ isset($data) && !is_null($data) ? '/abouts/'.$data->id.'/edit' : '/create' }}" class="btn btn-app" data-toggle="tooltip" title="" data-original-title="Tambah Client">
                <i class="fa fa-plus"></i> Tambah / Edit
            </a>
            <button class="btn btn-app" onclick="location.reload()" data-toggle="tooltip" title="" data-original-title="Refresh">
                <i class="fa fa-refresh"></i> Refresh
            </button>
        </div>
    </div>
</div>
<div class="text-center">
    <h3>{{ $data->judul }}</h3>
    {!! $data->description !!}
</div>

@endsection