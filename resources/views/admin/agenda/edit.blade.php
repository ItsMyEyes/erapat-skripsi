@extends('layouts.app')
@section('header','Agenda')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Create Agenda</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <form action="/agendas/{{$data->id}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method("PUT")
        <div class="form-group">
            <label for="">Judul Rapat</label>
            <input type="text" required name="judul" value="{{$data->judul}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="desc"  id="text-editor1" cols="30" rows="10" class="form-control">{{$data->desc}}</textarea>
        </div>
        <div class="form-group">
            <label for="">Start</label>
            <input type="datetime-local" required name="start" id="" class="form-control" value="{{$data->start}}">
        </div>
        <div class="form-group">
            <label for="">Selesai</label>
            <input type="datetime-local" required name="selesai" id="" class="form-control" value="{{$data->selesai}}">
        </div>
        <div class="form-group">
            <label for="">Type Rapat</label>
            <select name="type" class="form-control select2">
                    <option value="">~~ Pilih type rapat anda ~~</option>
                    <option value="terbuka" {{ $data->type_rapat == "terbuka" ? "selected" : "" }}>Rapat Terbuka</option>
                    <option value="tertutup" {{ $data->type_rapat == "tertutup" ? "selected" : "" }}>Rapat Tertutup</option>
                    <option value="formal" {{ $data->type_rapat == "formal" ? "selected" : "" }}>Rapat Formal</option>
                    <option value="informal" {{ $data->type_rapat == "informal" ? "selected" : "" }}>Rapat Informal</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Jangka Waktu</label>
            <select name="jangka_waktu" class="form-control select2">
                    <option value="">~~ Pilih Jangka Waktu anda ~~</option>
                    <option value="mingguan" {{ $data->jangka_waktu == "mingguan" ? "selected" : "" }}>Rapat mingguan</option>
                    <option value="bulanan" {{ $data->jangka_waktu == "bulanan" ? "selected" : "" }}>Rapat bulanan</option>
                    <option value="semesteran" {{ $data->jangka_waktu == "semesteran" ? "selected" : "" }}>Rapat semesteran</option>
                    <option value="tahunan" {{ $data->jangka_waktu == "tahunan" ? "selected" : "" }}>Rapat tahunan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Frekuensi rapat</label>
            <select name="frekuensi_rapat" class="form-control select2">
                    <option value="">~~ Pilih Frekuensi rapat anda ~~</option>
                    <option value="rutin" {{ $data->frekuensi_rapat == "rutin" ? "selected" : "" }}>Rapat rutin</option>
                    <option value="insidentil" {{ $data->frekuensi_rapat == "insidentil" ? "selected" : "" }}>Rapat insidentil</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Peserta</label>
            <select name="peserta[]"  class="form-control select2" multiple>
                @foreach ($user as $u)
                    <option value="{{$u->id}}" {{ (isset($u['selected']) && !is_null($u['selected'])) ? "selected" : "" }} >{{ $u->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Ruangan</label>
            <select name="ruangan" id="ruangan" required class="form-control select2">
                    <option value="">~~ Pilih ruangan anda ~~</option>
                    <option value="0">Zoom / Google Meet</option>
                @foreach ($ruangan as $r)
                    <option value="{{$r->id}}" {{ $r->id == $data->ruangan ? "selected" : "" }}>{{ $r->nama_ruangan }} {{ $r->id == $data->ruangan ? "(Digunakan Sekarang)" : "" }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" id="link" style="display: {{ (isset($data->link_rapat) && !is_null($data->link_rapat)) ? 'block' : 'none' }}">
            <label for="">Link Rapat</label>
            <input type="text" name="link_rapat" id="" value="{{ $data->link_rapat }}" class="form-control">
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