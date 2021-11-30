@extends('layouts.app')
@section('header','Hasil Rapat '.$data->judul)
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Create Hasil Rapat {{ $data->judul }}</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <form action="{{ url()->full() }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="">Judul Rapat</label>
            <input type="text" required value="{{$data->judul}}" readonly id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Uraian Singkat</label>
            <input type="text" required name="uraian" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Perhatian</label>
            <textarea name="perhatian" id="text-editor1" id="" cols="30" rows="10"></textarea>
        </div>

        <div id="parent">
            
            <label for="">Dokumentasi</label>
            <div class="entry input-group">
                <input class="form-control" name="files[]" type="file" placeholder="Type something" />
                <span class="input-group-btn">
                    <button class="btn btn-success btn-add" type="button">
                            <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-md mt-5">Create</button>
    </form>
@endsection
@section('script')
    <script>
        $(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();

                var dynaForm = $('#parent'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(dynaForm);

                newEntry.find('input').val('');
                dynaForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="glyphicon glyphicon-minus"></span>');
                }).on('click', '.btn-remove', function(e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });
    </script>
@endsection