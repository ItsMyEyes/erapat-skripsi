@extends('layouts.app')
@section('header', "Rekap rapat")
@section('content')
<div class="box-header with-border">
        <h3 class="box-title">Rekap Rapat</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="row">
    <div class="col-xs-12">
        <div class="pull-right">
            <a href="{{ url()->full() }}&cetak=true" class="btn btn-app" target="_blank">
            <i class="fa fa-file"></i> Cetak
            </a>
            <button type="button" class="btn btn-app" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-calendar"></i> Filter
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
        <form action="" method="get">
            @csrf
            <div class="form-group">
                <label for="">Type Rapat</label>
                <select name="type" class="form-control select2" style="width: 100%;">
                        <option value="">~~ Pilih type rapat anda ~~</option>
                        <option value="terbuka" {{ $type == 'terbuka' ? 'selected' : '' }}>Rapat Terbuka</option>
                        <option value="tertutup" {{ $type == 'tertutup' ? 'selected' : '' }}>Rapat Tertutup</option>
                        <option value="formal" {{ $type == 'formal' ? 'selected' : '' }}>Rapat Formal</option>
                        <option value="informal" {{ $type == 'informal' ? 'selected' : '' }}>Rapat Informal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Jangka Waktu</label>
                <select name="jangka_waktu" class="form-control select2" style="width: 100%;">
                        <option value="">~~ Pilih Jangka Waktu anda ~~</option>
                        <option value="mingguan" {{ $jangka_waktu == 'mingguan' ? 'selected' : '' }}>Rapat mingguan</option>
                        <option value="bulanan" {{ $jangka_waktu == 'bulanan' ? 'selected' : '' }}>Rapat bulanan</option>
                        <option value="semesteran" {{ $jangka_waktu == 'semesteran' ? 'selected' : '' }}>Rapat semesteran</option>
                        <option value="tahunan" {{ $jangka_waktu == 'tahunan' ? 'selected' : '' }}>Rapat tahunan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Rapat Status</label>
                <select name="selesai" class="form-control select2" style="width: 100%;">
                        <option value="">~~ Pilih Status Rapat anda ~~</option>
                        <option value="1" {{ $status == '1' ? 'selected' : '' }}>Rapat Selesai</option>
                        <option value="0" {{ $status == '0' ? 'selected' : '' }}>Rapat Belum Selesai</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Dari</label>
                <input type="date" name="from" id="" class="form-control" value="{{ $from }}">
            </div>
            <div class="form-group">
                <label for="">Sampai</label>
                <input type="date" name="to" id="" class="form-control" value="{{ $to }}">
            </div>
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