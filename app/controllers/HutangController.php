<?php

class HutangController extends \BaseController
{

    public function listHutang()
    {
        $listHutang = Hutang::where('sisa_hutang', '>', 0)->get();

        return View::make('pembelian.hutang.index', ['listHutang' => $listHutang]);
    }

    public function bayarHutangForm($id)
    {
        $hutang = Hutang::findOrFail($id)->first();

        return View::make('pembelian.hutang.pembayaran', ['hutang' => $hutang]);
    }

    public function bayarHutang($id)
    {
        $hutang = Hutang::findOrFail($id)->first();

        $pembayaranHutang = new PembayaranHutang();

        $pembayaranHutang->jumlah = Input::get('pembayaran_hutang');
        $pembayaranHutang->tanggal = (new DateTime)->format('Y-m-d');
        $pembayaranHutang->metode = Input::get('metode_pembayaran');

        $pembayaranHutang = $hutang->pembayaran()->save($pembayaranHutang);

        $hutang->bayarHutang($pembayaranHutang->jumlah);

        $hutang->save();

        return Redirect::to('/');
    }

}