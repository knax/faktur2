<?php

class PelangganController extends \BaseController
{

    public function listPelanggan()
    {
        $listPelanggan = Pelanggan::where('id', '!=', 1)->get();

        return View::make('pelanggan.index', ['listPelanggan' => $listPelanggan]);
    }

    public function bayarPiutangForm($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return View::make('pelanggan.pembayaran', ['pelanggan' => $pelanggan]);
    }

    public function bayarPiutang($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->bayarPiutang(Input::get('pembayaran_piutang'), Input::get('metode_pembayaran'));

        return Redirect::to('/');
    }

}