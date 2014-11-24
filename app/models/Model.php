<?php

/**
 * Model
 *
 * @method static \Model terakhir()
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class Model extends \Eloquent
{

    public $timestamps = false;

    public function scopeTerakhir($query)
    {
        $tanggalHariIni = (new DateTime())->format(NORMAL_DATE);

        return $query->where('tanggal', '<', $tanggalHariIni)->orderBy('tanggal', 'desc')->first();
    }

    public static function padaTanggal(DateTime $tanggal)
    {
        return static::where('tanggal', '=', $tanggal->format(NORMAL_DATE))->get();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeHariIni($query)
    {
        return $this->scopeTanggal($query, new DateTime());
    }

    /**
     * @param $query
     * @param DateTime $tanggal
     * @return mixed
     */
    public function scopeTanggal($query, DateTime $tanggal)
    {
        return $query->where('tanggal', '=', $tanggal->format(NORMAL_DATE));
    }

    public function scopeTanggalText($query, $tanggal)
    {
        return $this->scopeTanggal($query, DateTime::createFromFormat('Y-m-d', $tanggal));
    }
}