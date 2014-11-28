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

    public function barangTitipan($id)
    {
        $barangTitipan = BarangTitipan::findOrFail($id);

        return View::make('barang_titipan.details')->with('barangTitipan', $barangTitipan);
    }


    public function buatBarangTitipan()
    {
        $barangTitipan = new BarangTitipan();

        $barangTitipan->nama_penitip = Input::get('nama_penitip');

        $barangTitipan->save();

        $listBarangTitipan = Input::get('barang');

        foreach ($listBarangTitipan as $detail) {
            $barangTitipanDetail = new BarangTitipanDetail();

            $barangTitipanDetail->id_barang_titipan = $barangTitipan->id;
            $barangTitipanDetail->nama = $detail['nama-barang'];
            $barangTitipanDetail->unit = $detail['unit'];

            $barangTitipanDetail->save();
        }

        return Redirect::to('/');
    }

    public function kurangiBarangTitipanForm($id, $id_barang)
    {
        return View::make('barang_titipan.kurangi')->with('barangTitipanDetail', BarangTitipanDetail::findOrFail($id_barang));
    }

    public function kurangiBarangTitipan($id, $id_barang)
    {
        $barangTitipanDetail = BarangTitipanDetail::findOrFail($id_barang);

        $barangTitipanDetail->unit = $barangTitipanDetail->unit - Input::get('unit');

        $barangTitipanDetail->save();

        return Redirect::to('/');
    }
}
