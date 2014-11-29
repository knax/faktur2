<?php

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
            $pelanggan = new Pelanggan();

            $pelanggan->nama = Input::get('nama');
            $pelanggan->alamat = Input::get('alamat');
            $pelanggan->nomor_telepon = Input::get('nomor_telepon');

            $pelanggan->save();

            $penjualan->id_pelanggan = $pelanggan->id;
        } else {
            $penjualan->id_pelanggan = Input::get('id_konsumen');
        }
        $penjualan->sudah_dibayar = false;
        $penjualan->nama_marketing = Auth::user()->full_name;
        $penjualan->diskon = Input::get('diskon');
        $penjualan->ongkir = Input::get('ongkir');
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
        $snappy->setOption('margin-top', '2mm');
        $response = Response::make($snappy->getOutput($url));
        $response->header('Content-Type', 'application/pdf');
//        $response->header('Content-Disposition', 'attachment; filename="' . $penjualan->id . '.pdf"');
        return $response;
    }
}