var Faktur = {
    tambahDataKeTabel: function ($tableBody, $inputs) {
        var $row = $('<tr/>');
        var id = $tableBody.data('last-id') + 1;
        $tableBody.data('last-id', id);
        $row.append($('<td/>').html(id));
        var harga = $('input#harga-satuan').val() * $('input#unit').val();
        $inputs.each(function () {
            var $cell = $('<td/>');
            $cell.html($(this).val());
            $(this).val('');
            $cell.appendTo($row);
        });
        $row.append($('<td/>').addClass('harga-barang').html(harga));
        $row.appendTo($tableBody);
        var totalHarga = 0;
        $('td.harga-barang').each(function(){
            totalHarga = totalHarga + Math.floor($(this).html());
        });
        $('td#total-harga-barang').html(totalHarga);
    },
    makeTableRowClickable: function() {
        $.each($('table.table-clickable > tbody > tr'), function(index, value) {
            $(this)
                .click(function() {
                    window.location.href = document.URL + '/' + $(this)
                        .data('id');
                });
        });
    },
    setInputDateToToday: function() {
        $('input.date')
            .val(moment()
                .format('YYYY-MM-DD'));
    }
}

var $tableBody = $('table#data > tbody');
var $inputs = $('.data');
$('button#tambah').click(function (e) {
    e.preventDefault();
    Faktur.tambahDataKeTabel($tableBody, $inputs);
});
var $jenisKonsumen = $('input#jenis-konsumen');
var $namaKonsumen = $('div#nama-konsumen');
$namaKonsumen.toggle(false);
$jenisKonsumen.click(function(){
    $namaKonsumen.toggle(this.checked);
});
Faktur.makeTableRowClickable();
Faktur.setInputDateToToday();

var $activeNav = $('ul.nav > li').find('a[href$="' + document.location.pathname + '"]');
$activeNav.parent().addClass('active');

if($activeNav.parent().parent().hasClass('dropdown-menu')) {
    $activeNav.parent().parent().parent().addClass('active');
}