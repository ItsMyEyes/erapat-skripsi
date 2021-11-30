@extends('layouts.app')
@section('header','users')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Data users</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="row">
    <div class="col-xs-12">
        <div class="pull-right">
            <a href="/users/create" class="btn btn-app" data-toggle="tooltip" title="" data-original-title="Tambah Client">
                <i class="fa fa-plus"></i> Tambah
            </a>
            <button class="btn btn-app" onclick="location.reload()" data-toggle="tooltip" title="" data-original-title="Refresh">
                <i class="fa fa-refresh"></i> Refresh
            </button>
        </div>
    </div>
</div>
    <div class="table-responsive">
    <table id="table-client" class="table data table-bordered table-striped table-gan">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Role</th>
                <th>Last Update</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1?>
            @foreach($data as $a)
                <tr id="remove-item-{{$a->id}}">
                    <td>{{$no++}}</td>
                    <td>{{$a->name}}</td>
                    <td>{{ $a->role }}</td>
                    <td>{{($a->updated_at) ?  $a->updated_at->diffforhumans() : "No Updated"}}</td>
                    <td>
                        <a href="{{url()->full()}}/{{$a->id}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <span data-url="{{url()->full()}}/{{$a->id}}" data-id="{{$a->id}}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@endsection