<?php

class KasirController extends \BaseController
{

    public function daftarPembelianBelumDibayar()
    {
        $daftarPembelian = Pembelian::belumDibayar();

        return View::make('penjualan/kasir/index', ['daftarPembelian' => $daftarPembelian]);
    }

    public function bayarForm($id)
    {
        $pembelian = Pembelian::findOrFail($id);

        return View::make('penjualan/kasir/pembayaran', ['pembelian' => $pembelian]);
    }

    public function bayar($id)
    {
        $pembelian = Pembelian::findOrFail($id);

        $pembelian->sudah_dibayar = true;

        $pembelian->save();

        return Redirect::to('/penjualan/kasir');
    }

}