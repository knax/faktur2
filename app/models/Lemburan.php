<?php

/**
 * Lemburan
 *
 * @property integer $id
 * @property integer $detik
 * @property string $tanggal
 * @property integer $uang_makan
 * @property integer $id_karyawan
 * @property-read \Karyawan $karyawan
 * @method static \Illuminate\Database\Query\Builder|\Lemburan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Lemburan whereDetik($value)
 * @method static \Illuminate\Database\Query\Builder|\Lemburan whereTanggal($value)
 * @method static \Illuminate\Database\Query\Builder|\Lemburan whereUangMakan($value)
 * @method static \Illuminate\Database\Query\Builder|\Lemburan whereIdKaryawan($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 */
class Lemburan extends Model
{

    protected $table = 'lemburan';
    protected $guarded = ['id'];

    public function karyawan()
    {
        return $this->belongsTo('Karyawan', 'id_karyawan', 'id');
    }
}