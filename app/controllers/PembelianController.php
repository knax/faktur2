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
        $pembelian->metode_pembayaran = Input::get('metode_pembayaran');
        $pembelian->tanggal_pembelian = (new DateTime())->format('Y-m-d');
        $pembelian->save();

        $listBarang = Input::get('barang');

        foreach ($listBarang as $barang) {
            $barangDijual = Barang::findOrFail($barang['id_barang'])->first();
            $barangDijual->tambahStok($barang['unit']);
            $barangDijual->save();

            $pembelianDetail = new PembelianDetail();
            $pembelianDetail->id_pembelian = $pembelian->id;
            $pembelianDetail->id_barang = $barangDijual->id;
            $pembelianDetail->unit = $barang['unit'];
            $pembelianDetail->save();
        }

        if(Input::get('metode_pembayaran') == 'hutang') {
            $hutang = new Hutang();
            $hutang->id_pembelian = $pembelian->id;
            $hutang->jatuh_tempo = $tanggalJatuhTempo;
            $hutang->sisa_hutang = Input::get('total_harga');
            $hutang->save();
        }

        return Redirect::to('/');
    }
}