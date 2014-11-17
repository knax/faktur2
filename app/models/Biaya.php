<?php

class Biaya extends Model
{

    protected $table = 'biaya';
    protected $guarded = ['id'];

    public static function totalBiaya($tanggal)
    {
        $listBiaya = static::where('tanggal', '=', $tanggal)->get();

        $totalBiaya = 0;
        foreach ($listBiaya as $biaya) {
            $totalBiaya += $biaya->nominal;
        }

        return $totalBiaya;
    }

    public static function biayaHariIni()
    {
        return static::where('tanggal', '=', (new DateTime())->format('Y-m-d'))->get();
    }
}