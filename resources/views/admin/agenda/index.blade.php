@extends('layouts.app')
@section('header','Rapat')
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Data Rapat</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="row">
    <div class="col-xs-12">
        <div class="pull-right">
            <a href="{{url()->full()}}/create" class="btn btn-app" data-toggle="tooltip" title="" data-original-title="Tambah Client">
                <i class="fa fa-plus"></i> Tambah
            </a>
            <button type="button" class="btn btn-app" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-calendar"></i> Date
            </button>
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
                <th>Name Rapat</th>
                <th>Description</th>
                <th>Jumlah Peserta</th>
                <th>Start - Selesai</th>
                <th>Ruangan / Link Zoom/Meet</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1?>
            @foreach ($data as $v)
                <tr id="remove-item-{{$v['id']}}">
                    <td>{{ $no++; }}</td>
                    <td>{{ $v['nama'] }}</td>
                    <td><a href="{{url()->full()}}/{{$v['id']}}/edit">More...</a></td>
                    <td>{{ ($v['jumlah_peserta'] > 0) ? "Rapat Tertutup ({$v['jumlah_peserta']})" : "Rapat terbuka" }}</td>
                    <td>{{ $v['start']." - ".$v['selesai'] }}</td>
                    <td>{{ $v['nama_tempat'] }}</td>
                    <td>
                        @if (!$v['hasil_rapat'] && !$ini['hasil'])
                            <a href="{{url()->full()}}/{{$v['id']}}/selesaikan" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                            <a href="{{url()->full()}}/{{$v['id']}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="https://web.whatsapp.com/send?text=ini%20rapat" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-share-alt"></i></a>
                            <span data-url="{{url()->full()}}/{{$v['id']}}" data-id="{{$v['id']}}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></span>
                        @elseif($v['hasil_rapat'] && $ini['hasil'])
                            <a href="/agendas/{{$v['id']}}/detail" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="/agendas/{{$v['id']}}/presensi" class="btn btn-success btn-sm"><i class="fa fa-users"></i></a>
                        @elseif (!$v['hasil_rapat'])
                            <a href="/agendas" class="btn btn-danger btn-sm">Belum selesai</a>
                        @elseif ($v['hasil_rapat'])
                            <a href="/hasil" class="btn btn-success btn-sm">Selesai</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ ($ini['hasil']) ? '/hasil' : '/agendas/filter' }}" method="post">
            @csrf
            <input type="date" name="date" id="" class="form-control">
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
      </div>
    </div>
  </div>
</div>

@endsection