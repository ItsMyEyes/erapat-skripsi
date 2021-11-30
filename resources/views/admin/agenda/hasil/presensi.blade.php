@extends('layouts.app')
@section('header','Rapat '.$data->judul)
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Presensi Rapat {{$data->judul}} <small><a href="/agendas/{{$data->id}}/detail">(detail)</a></small></h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <table class="table data table-bordered table-striped table-gan">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Hadir / Tidak Hadir</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data->peserta as $d)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $d->detail->name }}</td>
                <td>{{ $d->kehadiran == 0 ? "Tidak Hadir" : "Hadir" }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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