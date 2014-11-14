<?php

class PelangganController extends \BaseController
{

    public function listPelanggan()
    {
        $listPelanggan = Pelanggan::all();

        return View::make('pelanggan/index', ['listPelanggan' => $listPelanggan]);
    }

    public function pembayaranForm($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return View::make('pelanggan.pembayaran', ['pelanggan' => $pelanggan]);
    }
}