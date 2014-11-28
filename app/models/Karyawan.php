<?php

/**
 * Karyawan
 *
 * @property integer $id
 * @property string $nama
 * @method static \Illuminate\Database\Query\Builder|\Karyawan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Karyawan whereNama($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Absen[] $absen
 * @property-read \Illuminate\Database\Eloquent\Collection|\Lemburan[] $lemburan
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 */
class Karyawan extends Model
{

    protected $table = 'karyawan';
    protected $guarded = ['id'];

    public function ambilAbsen($tanggal)
    {
        if($tanggal != (new DateTime())->format('Y-m-d')) {
            $absen = $this->absen()->tanggalText($tanggal)->first();
        } else {
            $absen = $this->absen()->hariIni()->first();
        }

//        var_dump($absen);

        if( is_null($absen) ) {
            $absen = new Absen();

            $absen->kehadiran = 'tidak';
            $absen->tanggal = DateTime::createFromFormat('Y-m-d', $tanggal)->format(NORMAL_DATE);

            $this->absen()->save($absen);
        }

        return $absen;
    }

    public function absen()
    {
        return $this->hasMany('Absen', 'id_karyawan', 'id');
    }

    public function lemburan()
    {
        return $this->hasMany('Lemburan', 'id_karyawan', 'id');
    }

}