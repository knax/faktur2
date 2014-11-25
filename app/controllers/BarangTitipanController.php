<?php

class BarangTitipanController extends BaseController
{

    public function listBarangTitipan()
    {
        $listBarangTitipan = BarangTitipan::all();

        return View::make('barang_titipan.index')->with('listBarangTitipan', $listBarangTitipan);
    }

    public function buatBarangTitipanForm()
    {
        return View::make('barang_titipan.create');
    }

    public function buatBarangTitipan()
    {
        $barangTitipan = new BarangTitipan();

        $barangTitipan->nama_barang = Input::get('nama_barang');
        $barangTitipan->nama_penitip = Input::get('nama_penitip');
        $barangTitipan->unit = Input::get('unit');

        $barangTitipan->save();

        return Redirect::to('/');
    }

    public function kurangiBarangTitipanForm($id)
    {
        return View::make('barang_titipan.kurangi')->with('barangTitipan', BarangTitipan::findOrFail($id));
    }

    public function kurangiBarangTitipan($id)
    {
        $barangTitipan = BarangTitipan::findOrFail($id);

        $barangTitipan->unit = $barangTitipan->unit - Input::get('unit');

        $barangTitipan->save();

        return Redirect::to('/');
    }
}
