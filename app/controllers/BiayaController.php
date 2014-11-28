<?php

class BiayaController extends \BaseController
{

    public function index()
    {
        $listBiayaHariIni = Biaya::biayaHariIni();

        $totalBiaya = Biaya::totalBiaya((new DateTime())->format('Y-m-d'));

        $hariIni = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern('EEEE, d MMMM yyyy');

        return View::make('biaya.index', [
            'listBiaya'  => $listBiayaHariIni,
            'totalBiaya' => $totalBiaya,
            'tanggal'    => $formatter->format($hariIni)
        ]);

    }

    public function buatBiaya()
    {
        $biaya = new Biaya();

        $biaya->nominal = Input::get('nominal');
        $biaya->keterangan = Input::get('keterangan');
        $biaya->tanggal = (new DateTime())->format('Y-m-d');

        $biaya->save();

        return Redirect::to('/');
    }

    public function buatKomisiForm()
    {
        $listKomisiHariIni = Komisi::komisiHariIni();

        $totalNominal = Komisi::totalNominal((new DateTime())->format('Y-m-d'));

        $hariIni = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern('EEEE, d MMMM yyyy');

        return View::make('biaya.komisi.index', [
            'listKomisi' => $listKomisiHariIni,
            'total'      => $totalNominal,
            'tanggal'    => $formatter->format($hariIni)
        ]);
    }

    public function buatKomisi()
    {
        $komisi = new Komisi();

        $komisi->tipe = Input::get('jenis_pembayaran');
        $komisi->nominal = Input::get('nominal');
        $komisi->tanggal = (new DateTime())->format('Y-m-d');

        $komisi->save();

        return Redirect::to('/');
    }

}