<?php

/**
 * BarangTitipan
 *
 * @property integer $id
 * @property string $nama_penitip
 * @property string $nama_barang
 * @property integer $unit
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipan whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipan whereNamaPenitip($value) 
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipan whereNamaBarang($value) 
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipan whereUnit($value) 
 * @method static \Model terakhir() 
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class BarangTitipan extends Model
{

    protected $table = 'barang_titipan';
    protected $guarded = ['id'];

}