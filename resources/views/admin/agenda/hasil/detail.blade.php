@extends('layouts.app')
@section('header','Rapat '.$data->judul)
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Detail Rapat {{$data->judul}} <small><a href="/agendas/{{$data->id}}/presensi">(Presensi)</a></small></h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div>
        <h4 class="text-center"><b>Uraian {{ $data->hasilRapat->uraian }}</b></h4>
        <p class="text-left">{!! $data->hasilRapat->perhatian !!}</p>
    </div>
    <br><br>
    <hr>
    <h4 class="text-center">Dokumentasi</h4>
    <div class="container">
        <div class="row">
            @if (count($data->dokumentasi) > 0)
                @foreach ($data->dokumentasi as $d)
                    <div class="col-2">
                        <a href="{{ $d->file }}" target="_blank" rel="noopener noreferrer"><img src="{{ $d->file }}" width="80" height="80" alt=""></a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
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