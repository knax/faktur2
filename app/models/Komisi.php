<?php

class Komisi extends Model
{

    protected $table = 'komisi';
    protected $guarded = ['id'];

    public static function totalNominal($tanggal)
    {
        $listKomisi = static::where('tanggal', '=', $tanggal)->get();

        $totalNominal = 0;
        foreach ($listKomisi as $komisi) {
            $totalNominal += $komisi->nominal;
        }

        return $totalNominal;
    }

    public static function komisiHariIni()
    {
        return Komisi::where('tanggal', '=', (new DateTime())->format('Y-m-d'))->get();
    }
}