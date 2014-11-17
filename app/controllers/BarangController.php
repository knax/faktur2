<?php

class BarangController extends \BaseController
{

    public function index()
    {
        $barang = Barang::all();

        $totalHargaStok = 0;

        foreach ($barang as $baris) {
            $totalHargaStok = $totalHargaStok + ($baris->stok * $baris->harga);
        }

        return View::make('stok.index', ['barang' => $barang, 'totalHargaStok' => $totalHargaStok]);
    }

    public function barang()
    {
        $barang = Barang::all();

        return View::make('stok.barang.index', ['barang' => $barang]);
    }

    public function buatBarang()
    {
        $barang = new Barang();
        $barang->nama = Input::get('nama_barang');
        $barang->harga = Input::get('harga_modal');
        $barang->batas_keuntungan_bawah = Input::get('batas_keuntungan_bawah');
        $barang->batas_keuntungan_atas = Input::get('batas_keuntungan_atas');
        $barang->stok = 0;

        $barang->save();

        return Redirect::to('/stok/barang');
    }

    public function buatBarangForm()
    {
        return View::make('stok.barang.tambah');
    }

    public function detail($id)
    {
        $barang = Barang::findOrFail($id);

        return View::make('stok.barang.detail', ['barang' => $barang]);
    }

    public function editBarangForm($id)
    {
        $barang = Barang::findOrFail($id);

        return View::make('stok.barang.edit', ['barang' => $barang]);
    }

    public function editBarang($id)
    {
        $barang = Barang::findOrFail($id)->first();
        $barang->nama = Input::get('nama_barang');
        $barang->harga = Input::get('harga_modal');
        $barang->batas_keuntungan_bawah = Input::get('batas_keuntungan_bawah');
        $barang->batas_keuntungan_atas = Input::get('batas_keuntungan_atas');

        $barang->save();

        return Redirect::to('/stok/barang');
    }

}