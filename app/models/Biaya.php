<?php

/**
 * Biaya
 *
 * @property integer $id
 * @property integer $nominal
 * @property string $keterangan
 * @property string $tanggal
 * @method static \Illuminate\Database\Query\Builder|\Biaya whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Biaya whereNominal($value)
 * @method static \Illuminate\Database\Query\Builder|\Biaya whereKeterangan($value)
 * @method static \Illuminate\Database\Query\Builder|\Biaya whereTanggal($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 */
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

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function biayaHariIni()
    {
        return static::biayaPadaTanggal(new DateTime());
    }

    /**
     * @param DateTime $tanggal
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function biayaPadaTanggal(DateTime $tanggal)
    {
        return static::where('tanggal', '=', $tanggal->format(NORMAL_DATE))->get();
    }
}