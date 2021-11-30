@extends('layouts.app')
@section('header','Agenda')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Create Agenda</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <form action="/agendas" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="">Judul Rapat</label>
            <input type="text" name="judul" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="desc"  id="text-editor1" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="">Start</label>
            <input type="datetime-local" name="start" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Selesai</label>
            <input type="datetime-local" name="selesai" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Type Rapat</label>
            <select name="type" class="form-control select2">
                    <option value="">~~ Pilih type rapat anda ~~</option>
                    <option value="terbuka">Rapat Terbuka</option>
                    <option value="tertutup">Rapat Tertutup</option>
                    <option value="formal">Rapat Formal</option>
                    <option value="informal">Rapat Informal</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Jangka Waktu</label>
            <select name="jangka_waktu" class="form-control select2">
                    <option value="">~~ Pilih Jangka Waktu anda ~~</option>
                    <option value="mingguan">Rapat mingguan</option>
                    <option value="bulanan">Rapat bulanan</option>
                    <option value="semesteran">Rapat semesteran</option>
                    <option value="tahunan">Rapat tahunan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Frekuensi rapat</label>
            <select name="frekuensi_rapat" class="form-control select2">
                    <option value="">~~ Pilih Frekuensi rapat anda ~~</option>
                    <option value="rutin">Rapat rutin</option>
                    <option value="insidentil">Rapat insidentil</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Peserta (Optional)</label>
            <select name="peserta[]" id="" id="type_rapat" class="form-control select2" multiple>
                @foreach ($user as $u)
                    <option value="{{$u->id}}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Ruangan</label>
            <select name="ruangan" id="ruangan" class="form-control select2">
                    <option value="">~~ Pilih ruangan anda ~~</option>
                    <option value="0">Zoom / Google Meet</option>
                @foreach ($ruangan as $r)
                    <option value="{{$r->id}}">{{ $r->nama_ruangan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" id="link" style="display: none">
            <label for="">Link Rapat</label>
            <input type="text" name="link_rapat" id="" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary btn-md">Create</button>

    </form>
@endsection
@section('script')
    <script>
        $(document.body).on("change","#ruangan",function(){
            const va = this.value
            if (va == 0 && va !== '') {
                $('#link').css('display','block')
            } else {
                $('#link').css('display','none')
            }
        });
    </script>
@endsection