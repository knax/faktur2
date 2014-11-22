<?php

class KaryawanController extends \BaseController
{

    public function listKaryawan()
    {
        $listKaryawan = Karyawan::all();

        return View::make('karyawan.index')->with('listKaryawan', $listKaryawan);
    }

    public function detailKaryawan($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        return View::make('karyawan.detail')->with('karyawan', $karyawan);
    }

    public function listAbsen()
    {
        $tanggal = Input::get('tanggal');


        if( is_null($tanggal) ) {
            $tanggal = new DateTime();
        } else {
            $tanggal = DateTime::createFromFormat('Y-m-d', $tanggal);
        }

//        var_dump($tanggal);

        $listKaryawan = Karyawan::whereHas('absen', function ($q) use($tanggal) {
            $q->where('tanggal', '=', $tanggal->format('Y-m-d'));
        })->get();

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern('EEEE, d MMMM yyyy');

        return View::make('karyawan.absen.index')
                   ->with('listKaryawan', $listKaryawan)
                   ->with('tanggalRaw', $tanggal->format(NORMAL_DATE))
                   ->with('tanggal', $formatter->format($tanggal));
    }

    public function absenKaryawan($id, $tipe)
    {
        $karyawan = Karyawan::findOrFail($id);

        // TODO tanggal absen sebelumnya
        $absen = $karyawan->absenTerakhir();
        $absen->kehadiran = $tipe;
        $absen->save();

        return Redirect::to('/karyawan/absen');
    }

    public function listLemburan()
    {
        $listLemburan = Lemburan::padaTanggal(new DateTime());

        $hariIni = new DateTime();

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern('EEEE, d MMMM yyyy');

        return View::make('karyawan.lemburan.index')
                   ->with('listLemburan', $listLemburan)
                   ->with('tanggal', $formatter->format($hariIni));
    }

}