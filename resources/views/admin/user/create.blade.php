@extends('layouts.app')
@section('header','User')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Create User</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <form action="/users" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="">Name</label>
            <input type="test" required name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" required name="email" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" required name="password" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Role</label>
            <select name="role" id="" required class="form-control">
                <option value="" selected>~~ Select Your Role ~~</option>
                <option value="admin">Admin</option>
                <option value="panitia">Panitia</option>
                <option value="peserta">peserta</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-md">Create</button>

    </form>
@endsection