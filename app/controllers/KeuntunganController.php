<?php

class KeuntunganController extends \BaseController
{

    public function barangTerjual()
    {
        $tanggal = Input::get('tanggal_mulai', (new DateTime())->format('Y-m-d'));

        $hariIni = DateTime::createFromFormat('Y-m-d', $tanggal);

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern('EEEE, d MMMM yyyy');

        $listBarangTerjual = Barang::barangTerjual($tanggal);

        return View::make('keuntungan.barang_terjual.index', [
            'listBarangTerjual' => $listBarangTerjual,
            'tanggal'           => $formatter->format($hariIni)
        ]);

    }

    public static function totalPenjualan()
    {
        $listPenjualan = Penjualan::where('tanggal_penjualan', '=', (new DateTime())->format('Y-m-d'));

        $totalPenjualan = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $totalPenjualan += $penjualanDetail->unit * $penjualanDetail->harga;
            }
        }

        return $totalPenjualan;
    }
}