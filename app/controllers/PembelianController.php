<?php

class PembelianController extends \BaseController
{

    public function beliBarangForm()
    {
        $listBarang = Barang::all();

        return View::make('pembelian.index', ['listBarang' => $listBarang]);
    }

    public function beliBarang()
    {
        $tanggalJatuhTempo = (new DateTime())->modify('+' . Input::get('jatuh_tempo') . 'days')->format('Y-m-d');

        $pembelian = new Pembelian();
        $pembelian->nama_supplier = Input::get('nama');
        $pembelian->jatuh_tempo = $tanggalJatuhTempo;
        $pembelian->metode_pembayaran = Input::get('metode_pembayaran');
        $pembelian->save();

        $listBarang = Input::get('barang');

        foreach ($listBarang as $barang) {
            $barangDijual = Barang::findOrFail($barang['id_barang'])->first();
            $barangDijual->stok = $barangDijual->stok + $barang['unit'];
            $barangDijual->save();

            $pembelianDetail = new PembelianDetail();
            $pembelianDetail->id_pembelian = $pembelian->id;
            $pembelianDetail->id_barang = $barangDijual->id;
            $pembelianDetail->unit = $barang['unit'];
            $pembelianDetail->save();
        }

        return Redirect::to('/');
    }
}