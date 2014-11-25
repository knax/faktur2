<?php

/**
 * HakAkses
 *
 * @property integer $id
 * @property string $nama
 * @property string $keterangan
 * @method static \Illuminate\Database\Query\Builder|\HakAkses whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\HakAkses whereNama($value)
 * @method static \Illuminate\Database\Query\Builder|\HakAkses whereKeterangan($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 * @property string $judul
 * @method static \Illuminate\Database\Query\Builder|\HakAkses whereJudul($value) 
 */
class HakAkses extends Model
{

    protected $table = 'hak_akses';
    protected $guarded = ['id'];

}