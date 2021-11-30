@extends('layouts.app')
@section('header','User')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Edit User</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <form action="/users/{{$data->id}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method('PUT')
        <div class="form-group">
            <label for="">Name</label>
            <input type="test" required name="name" id="" value="{{$data->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" required name="email" id="" value="{{$data->email}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Role</label>
            <select name="role" id="" required class="form-control">
                <option value="" selected>~~ Select Your Role ~~</option>
                <option value="admin" {{ $data->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="panitia" {{ $data->role == 'panitia' ? 'selected' : '' }}>Panitia</option>
                <option value="peserta" {{ $data->role == 'peserta' ? 'selected' : '' }}>peserta</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-md">Edit</button>

    </form>
@endsection