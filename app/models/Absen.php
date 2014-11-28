<?php

/**
 * Absen
 *
 * @property integer $id
 * @property string $kehadiran
 * @property string $tanggal
 * @property integer $id_karyawan
 * @method static \Illuminate\Database\Query\Builder|\Absen whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Absen whereKehadiran($value)
 * @method static \Illuminate\Database\Query\Builder|\Absen whereTanggal($value)
 * @method static \Illuminate\Database\Query\Builder|\Absen whereIdKaryawan($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 */
class Absen extends Model
{

    protected $table = 'absen';
    protected $guarded = ['id'];

}