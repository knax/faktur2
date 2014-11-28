<?php

use mikehaertl\wkhtmlto\Pdf;

class MarketingController extends \BaseController
{

    public function jualBarangForm()
    {
        $listPelanggan = Pelanggan::where('id', '!=', '1')->get();
        $listBarang = Barang::all();

        return View::make('penjualan.marketing.index',
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
        $penjualan->tanggal_penjualan = (new DateTime())->format('Y-m-d');

        $penjualan->save();

        $listBarang = Input::get('barang');

        foreach ($listBarang as $barang) {
            $penjualanDetail = new PenjualanDetail();

            $barangDijual = Barang::findOrFail($barang['id_barang']);

            $barangDijual->kurangiStok($barang['unit']);

            $barangDijual->save();

            $penjualanDetail->id_penjualan = $penjualan->id;
            $penjualanDetail->id_barang = $barangDijual->id;
            $penjualanDetail->harga = $barang['harga_satuan'];
            $penjualanDetail->unit = $barang['unit'];

            $penjualanDetail->save();
        }

        return Redirect::to(URL::route('marketing.print', ['id' => $penjualan->id]));
    }

    public function printRaw($id){
        $penjualan = Penjualan::findOrFail($id);

        return View::make('penjualan.marketing.print.raw')->with('penjualan', $penjualan);
    }

    public function printFaktur($id){
        $penjualan = Penjualan::findOrFail($id);

        $url = URL::route('marketing.print.raw', ['id' => $id]);

        $binary = '/home/knax/PhpstormProjects/faktur2/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64';

        $snappy = new Knp\Snappy\Pdf($binary);
        $response = Response::make($snappy->getOutput($url));
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="' . $penjualan->id . '.pdf"');
        return $response;
    }
}