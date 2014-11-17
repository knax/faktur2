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

        $pembayaranHutang = new PembayaranPiutang();

        $pembayaranHutang->jumlah = Input::get('pembayaran_piutang');
        $pembayaranHutang->tanggal = (new DateTime)->format('Y-m-d');
        $pembayaranHutang->metode = Input::get('metode_pembayaran');

        $pembayaranHutang = $pelanggan->pembayaran()->save($pembayaranHutang);

        $pelanggan->bayarHutang($pembayaranHutang->jumlah);

        $pelanggan->save();

        return Redirect::to('/');
    }

}