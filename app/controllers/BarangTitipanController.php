<?php

class BarangTitipanController extends BaseController
{

    public function listBarangTitipan()
    {
        $listBarangTitipan = BarangTitipan::all();

        return View::make('barang_titipan.index')->with('listBarangTitipan', $listBarangTitipan);
    }

    public function barangTitipan($id)
    {
        $barangTitipan = BarangTitipan::findOrFail($id);

        return View::make('barang_titipan.details')->with('barangTitipan', $barangTitipan);
    }

    public function buatSuratJalanForm($id)
    {
        $barangTitipan = BarangTitipan::findOrFail($id);

        return View::make('barang_titipan.surat_jalan')->with('barangTitipan', $barangTitipan);
    }

    public function buatSuratJalan($id)
    {
        $barangTitipan = BarangTitipan::findOrFail($id);

        $suratJalan = new SuratJalan();

        $suratJalan->alamat = Input::get('alamat');
        $suratJalan->penulis = Input::get('penulis');
        $suratJalan->nama = Input::get('nama');

        $barangTitipan->suratJalan()->save($suratJalan);

        foreach (Input::get('barang') as $detail) {
            $suratJalanDetail = new SuratJalanDetail();

            $barangTitipanDetail = BarangTitipanDetail::findOrFail($detail['id_barang_penitipan_detail']);

            $suratJalanDetail->unit = $detail['unit'];
            $suratJalanDetail->id_barang = $barangTitipanDetail->barang->id;
            $suratJalanDetail->id_surat_jalan = $suratJalan->id;
            $suratJalanDetail->save();

            //            $barangTitipanDetail->barang->suratJalanDetail()->save($suratJalanDetail);

            $barangTitipanDetail->kurangiUnit($detail['unit']);

            $barangTitipanDetail->save();
        }

        //        var_dump(Input::all());
        return Redirect::route('barang_titipan.surat_jalan.print', ['id' => $suratJalan->id]);
//                return View::make('barang_titipan.surat_jalan')->with('barangTitipan', $barangTitipan);
    }

    public function printSuratJalanRaw($id)
    {
        $suratJalan = SuratJalan::findOrFail($id);

        return View::make('barang_titipan.surat_jalan.print.raw')->with('suratJalan', $suratJalan);
    }

    public function printSuratJalan($id)
    {
        $penjualan = SuratJalan::findOrFail($id);

        $url = URL::route('barang_titipan.surat_jalan.print.raw', ['id' => $id]);

        $binary = '/home/knax/PhpstormProjects/faktur2/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64';

        $snappy = new Knp\Snappy\Pdf($binary);
        $response = Response::make($snappy->getOutput($url));
        $response->header('Content-Type', 'application/pdf');
//        $response->header('Content-Disposition', 'attachment; filename="' . $penjualan->id . '.pdf"');

        return $response;
    }

}
