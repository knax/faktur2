<?php

/**
 * Komisi
 *
 * @property integer $id
 * @property string $tipe
 * @property integer $nominal
 * @property string $tanggal
 * @method static \Illuminate\Database\Query\Builder|\Komisi whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Komisi whereTipe($value)
 * @method static \Illuminate\Database\Query\Builder|\Komisi whereNominal($value)
 * @method static \Illuminate\Database\Query\Builder|\Komisi whereTanggal($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 */
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