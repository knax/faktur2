var Faktur = {

    tambahDataKeTabel: function ($tableBody, $inputs) {

        var $row = $('<tr/>');
        var id = $tableBody.data('last-id') + 1;

        $tableBody.data('last-id', id);
        $row.append($('<td/>').html(id));


        var harga = Faktur.toRupiah($('input#harga-satuan').val() * $('input#unit').val());

        Faktur.inputToTable($inputs, $row, id);

        $row.append($('<td/>').addClass('harga-barang').html(harga));

        $row.appendTo($tableBody);

        var totalHarga = 0;
        $('td.harga-barang').each(function () {
            totalHarga = totalHarga + Math.floor($(this).html().replace(/[^\/\d]/g, ''));
        });
        $('td#total-harga-barang').html(Faktur.toRupiah(totalHarga));

        var totalDiskon = parseInt($('input#diskon').val());
        $('td#diskon-text').html(Faktur.toRupiah(totalDiskon));
        var ongkir = parseInt($('input#ongkir').val());
        $('td#ongkir-text').html(Faktur.toRupiah(ongkir));

        $('td#grand-total').html(Faktur.toRupiah(parseInt(totalHarga) - parseInt(totalDiskon) + parseInt(ongkir)));
    },
    tambahDataKeTabelPenitipan: function ($tableBody, $inputs) {

        var $row = $('<tr/>');
        var id = $tableBody.data('last-id') + 1;

        $tableBody.data('last-id', id);
        $row.append($('<td/>').html(id));

        $row.appendTo($tableBody);

        Faktur.inputToTable($inputs, $row, id);
    },
    tambahDataKeTabelPembelian: function ($tableBody, $inputs) {

        var $row = $('<tr/>');
        var id = $tableBody.data('last-id') + 1;

        $tableBody.data('last-id', id);
        $row.append($('<td/>').html(id));

        Faktur.inputToTable($inputs, $row, id);

        var hargaSatuan = $('select#barang-pembelian').find(':selected').data('harga');
        var harga = Faktur.toRupiah(hargaSatuan * $('input#unit-pembelian').val());

        $('span#harga-satuan').html(harga);

        $row.append($('<td/>').html(hargaSatuan));
        $row.append($('<td/>').addClass('harga-barang').html(harga));

        $row.appendTo($tableBody);


        var totalHarga = 0;
        $('td.harga-barang').each(function () {
            totalHarga = totalHarga + Math.floor($(this).html().replace(/[^\/\d]/g, ''));
        });
        $('td#total-harga-barang').html(Faktur.toRupiah(totalHarga));
        $('input#total-harga').val(totalHarga);

    },
    inputToTable: function ($inputs, $row, id) {
        $inputs.each(function () {
            var $cell = $('<td/>');
            var $input = $('<input/>');

            $input.attr('hidden', '1');

            if ($(this).is('select')) {
                $input.attr('value', $(this).find(':selected').data('id'));
            } else {
                $input.attr('value', $(this).val());
            }

            $input.attr('name', 'barang[' + id + '][' + $(this).attr('name') + ']');

            $cell.html($(this).val());
            $cell.append($input);
            $(this).val('');
            $cell.appendTo($row);
        });

    },
    makeTableRowClickable: function () {
        $.each($('table.table-clickable > tbody > tr'), function (index, value) {
            $(this)
                .click(function () {
                    window.location.href = document.URL + '/' + $(this)
                        .data('id');
                });
        });
    },
    setInputDateToToday: function () {
        $('input.date')
            .val(moment()
                .format('YYYY-MM-DD'));
    },
    toRupiah: function (angka) {
        var rev = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2 = '';
        for (var i = 0; i < rev.length; i++) {
            rev2 += rev[i];
            if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
                rev2 += '.';
            }
        }
        return 'Rp. ' + rev2.split('').reverse().join('') + ',-';
    }
};

var $tableBody = $('table#data > tbody');
var $inputs = $('.data');
$('button#tambah').click(function (e) {
    e.preventDefault();
    Faktur.tambahDataKeTabel($tableBody, $inputs);
    $('span#stok-sisa').parent().addClass('hidden');
    $('span#range-harga').parent().addClass('hidden');
});

if ($tableBody) {
    var changeDiskon = function() {
        var totalHarga = 0;
        $('td.harga-barang').each(function () {
            totalHarga = totalHarga + Math.floor($(this).html().replace(/[^\/\d]/g, ''));
        });

        var totalDiskon = parseInt($('input#diskon').val());
        $('td#diskon-text').html(Faktur.toRupiah(totalDiskon));
        var ongkir = parseInt($('input#ongkir').val());
        $('td#ongkir-text').html(Faktur.toRupiah(ongkir));

        $('td#grand-total').html(Faktur.toRupiah(totalHarga - totalDiskon + ongkir));
    }
    $('input#diskon').change(changeDiskon);
    $('input#ongkir').change(changeDiskon);
}

var $tableBodyPembelian = $('table#data-pembelian > tbody');
var $inputsPembelian = $('.data-pembelian');
$('button#tambah-pembelian').click(function (e) {
    e.preventDefault();
    Faktur.tambahDataKeTabelPembelian($tableBodyPembelian, $inputsPembelian);
});


var $tableBodyPenitipan = $('table#data-penitipan > tbody');
var $inputsPenitipan = $('.data-penitipan');
$('button#tambah-penitipan').click(function (e) {
    e.preventDefault();
    Faktur.tambahDataKeTabelPenitipan($tableBodyPenitipan, $inputsPenitipan);
});

var $jenisKonsumen = $('input#jenis-konsumen');
var $namaKonsumen = $('div#nama-konsumen');
$namaKonsumen.toggle(false);
$jenisKonsumen.click(function () {
    $namaKonsumen.toggle(this.checked);
});
Faktur.makeTableRowClickable();
Faktur.setInputDateToToday();

var $selectBarang = $('select#barang');

// Set harga satuan
var $spanRangeHarga = $('span#range-harga');
var hargaSatuanTerpilih = $selectBarang.find(':selected').data('range-harga');
$spanRangeHarga.html(hargaSatuanTerpilih);
$spanRangeHarga.parent().removeClass('hidden');

$('input#harga-satuan').attr('min', $selectBarang.find(':selected').data('harga-bawah'));
$('input#harga-satuan').attr('max', $selectBarang.find(':selected').data('harga-atas'));

$selectBarang.change(function (e) {
    $('input#harga-satuan').attr('min', $selectBarang.find(':selected').data('harga-bawah'));
    $('input#harga-satuan').attr('max', $selectBarang.find(':selected').data('harga-atas'));
    hargaSatuanTerpilih = $selectBarang.find(':selected').data('range-harga');
    $spanRangeHarga.html(hargaSatuanTerpilih);
    $spanRangeHarga.parent().removeClass('hidden');
});
// End set harga satuan

// Set stok barang
var $spanStokSisa = $('span#stok-sisa');
var stokBarangTerpilih = $selectBarang.find(':selected').data('stok');
$spanStokSisa.html(stokBarangTerpilih);
$spanStokSisa.parent().removeClass('hidden');
$('input#unit').attr('max', stokBarangTerpilih);

$selectBarang.change(function (e) {
    stokBarangTerpilih = $('select#barang').find(':selected').data('stok');
    $spanStokSisa.html(stokBarangTerpilih);
    $spanStokSisa.parent().removeClass('hidden');
});
// End set stok barang

// stok barang penitipan
var $selectBarangPenitipan = $('select#barang-penitipan');

var $spanUnitSisa = $('span#unit-sisa');
var stokBarangTerpilih = $selectBarangPenitipan.find(':selected').data('unit-sisa');
$spanUnitSisa.html(stokBarangTerpilih);
$spanUnitSisa.parent().removeClass('hidden');

$selectBarangPenitipan.change(function (e) {
    stokBarangTerpilih = $selectBarangPenitipan.find(':selected').data('unit-sisa');
    $spanUnitSisa.html(stokBarangTerpilih);
    $spanUnitSisa.parent().removeClass('hidden');
});
// end

// Tampilkan harga satuan

var harga = $('select#barang-pembelian').find(':selected').data('harga');
$('span#harga-satuan').html(harga);

$('select#barang-pembelian').change(function (e) {
    var harga = $('select#barang-pembelian').find(':selected').data('harga');
    $('span#harga-satuan').html(harga);

    $('form#form-marketing').bootstrapValidator('revalidateField', 'barang-pembelian');
});
// End tampilkan


// Bikin navbar aktif sesuai link
var $activeNav = $('ul.nav > li').find('a[href$="' + document.location.pathname + '"]');
$activeNav.parent().addClass('active');

if ($activeNav.parent().parent().hasClass('dropdown-menu')) {
    $activeNav.parent().parent().parent().addClass('active');
}
// End bikin navbar aktif


//$('form#form-marketing').bootstrapValidator({
//    fields: {
//        unit: {
//            validators: {
//                value: $
//            }
//        }
//
//    }
//});