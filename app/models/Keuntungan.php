<?php

class Keuntungan extends Model
{

    protected $table = 'uang';
    protected $guarded = ['id'];

    public $tanggalPerhitungan;

    public static function totalPenjualan()
    {
        $listPenjualan = Penjualan::where('tanggal_penjualan', '=',
            (new DateTime())->modify('-3 days')->format('Y-m-d'));

        $totalHarga = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $totalHarga += $penjualanDetail->unit * $penjualanDetail->harga;
            }
        }

        return $totalHarga;
    }

    public static function totalHargaModal()
    {

        $listPenjualan = Penjualan::where('tanggal_penjualan', '=',
            (new DateTime())->modify('-3 days')->format('Y-m-d'));

        $totalHargaModal = 0;

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $totalHargaModal += $penjualanDetail->unit * $penjualanDetail->barang()->harga;
            }
        }

        return $totalHargaModal;
    }

    public static function labaKotor()
    {
        return static::totalPenjualan() - static::totalHargaModal();
    }
}