"use strict";
var url = '/search';$('.mata-uang').mask('0.000.000.000', {reverse: true});
$('input').iCheck({checkboxClass: 'icheckbox_square-blue',radioClass: 'iradio_square-blue',increaseArea: '20%'});$('.select2').select2();
$('.table-gan').DataTable();
function kurang(qty) {
    var qtyBefore = $('#code-'+qty).val();
    var harga = $('.unit-'+qty).val();
    var now = qtyBefore - 1
    if (now == 0) {
        alert('Harus Lebih Dari 1')
    }else{
        var sum = harga*now;
        $('.amount-'+qty).val(sum);
        $('#code-'+qty).val(now)
    }
    calcTotal()
}

function langsung(qty,id,stok) {
    var harga = $('.unit-'+id).val();
    if (qty > stok) {
        alert('Stok Tersisa '+stok)
        var sum = harga*stok;
        $('.amount-'+qty).val(sum);
        $('#code-'+qty).val(now)
    }else{
        var sum = harga*qty
        $('.amount-'+id).val(sum);
    }
    calcTotal()
}
function tambah(qty,stok) {
    var qtyBefore = $('#code-'+qty).val();
    var harga = $('.unit-'+qty).val();
    var now = parseInt(qtyBefore)+parseInt(1)
    if (stok > stok) {
        alert('Stok Tersisa '+stok)
        var sum = harga*stok;
        $('.amount-'+qty).val(sum);
        $('#code-'+qty).val(now)
    }else{
        var sum = harga*now;
        $('.amount-'+qty).val(sum);
        $('#code-'+qty).val(now)
    }
    calcTotal()
}
function calcTotal() {
    var sum = 0;
    $(".subTotal").each(function(){
        sum += +$(this).val();
    });
    var withFormat = formatRupiah(sum)
    $('.total2').val(withFormat);
    $("#total").val(sum);
    bayar(sum)
};

function bayar() {
    var jumuang = $('#jml_uang').val();
    var hsl=jumuang.replace(/[^\d]/g,"");
    var qwe = $("#total").val();
    var ini = parseInt(hsl) - parseInt(qwe)
    var data = formatRupiah(ini)
    $('#kembalians').val(ini)
    $('.kembalian').val(data)
}

function formatRupiah(bilangan){
    var	number_string = bilangan.toString(),
        sisa 	= number_string.length % 3,
        rupiah 	= number_string.substr(0, sisa),
        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
            
    if (ribuan) {
        var separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    return 'Rp. '+rupiah;
}
$('.cari').select2({placeholder: 'Cari...',ajax: {url: url,dataType: 'json',delay: 250,processResults: function (data) {return {results:  $.map(data, function (item) {return {text: item.name,id: item.code}})};},cache: true}});
calcTotal();