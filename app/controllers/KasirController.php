<?php

class KasirController extends \BaseController
{

    public function daftarPenjualanBelumDibayar()
    {
        $daftarPenjualan = Penjualan::belumDibayar();

        return View::make('penjualan/kasir/index', ['daftarPenjualan' => $daftarPenjualan]);
    }

    public function bayarForm($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        return View::make('penjualan/kasir/pembayaran', ['penjualan' => $penjualan]);
    }

    public function bayar($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $penjualan->sudah_dibayar = true;

        $penjualan->save();

        return Redirect::to('/penjualan/kasir');
    }

}