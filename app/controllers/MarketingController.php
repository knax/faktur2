<?php

class MarketingController extends \BaseController {

    public function beliBarangForm()
    {
        $listPelanggan = Pelanggan::where('id', '!=', '1')->get();
        $listBarang = Barang::all();

        return View::make('penjualan/marketing/index', ['listPelanggan' => $listPelanggan, 'listBarang' => $listBarang]);
	}

}