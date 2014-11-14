<?php

class MarketingController extends \BaseController
{

    public function jualBarangForm()
    {
        $listPelanggan = Pelanggan::where('id', '!=', '1')->get();
        $listBarang = Barang::all();

        return View::make('penjualan/marketing/index',
            ['listPelanggan' => $listPelanggan, 'listBarang' => $listBarang]);
    }

    public function jualBarang()
    {
        $penjualan = new Penjualan();

        $jenisKonsumen = Input::get('jenis_konsumen');
        if( !$jenisKonsumen ) {
            $penjualan->id_pelanggan = 1;
        } else {
            $penjualan->id_pelanggan = Input::get('id_konsumen');
        }
        $penjualan->sudah_dibayar = false;

        $penjualan->save();

        $listBarang = Input::get('barang');

        foreach ($listBarang as $barang) {
            $penjualanDetail = new PenjualanDetail();

            $barangDijual = Barang::findOrFail($barang['id_barang'])->first();

            $barangDijual->stok = $barangDijual->stok - $barang['unit'];

            $barangDijual->save();

            $penjualanDetail->id_penjualan = $penjualan->id;
            $penjualanDetail->id_barang = $barangDijual->id;
            $penjualanDetail->harga = $barang['harga_satuan'];
            $penjualanDetail->unit = $barang['unit'];

            $penjualanDetail->save();
        }

        return Redirect::to('/');
    }
}