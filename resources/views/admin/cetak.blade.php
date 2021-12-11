
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
  <meta name="language" content="english">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>

<table id="tbl_exporttable_to_xls" class="table data table-bordered table-striped table-gan" border="1">
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

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
    function ExportToExcel(name, type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || (name + '.' + (type || 'xlsx')));
    }

    ExportToExcel('Rekap Rapat', 'xlsx')
    window.close()
</script>

</body>
</html>
