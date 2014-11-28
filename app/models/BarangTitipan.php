<?php

/**
 * BarangTitipan
 *
 * @property integer $id
 * @property string $nama_penitip
 * @property-read \Illuminate\Database\Eloquent\Collection|\BarangTitipanDetail[] $detail
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipan whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipan whereNamaPenitip($value) 
 * @method static \Model terakhir() 
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class BarangTitipan extends Model
{

    protected $table = 'barang_titipan';
    protected $guarded = ['id'];

    public function detail()
    {
        return $this->hasMany('BarangTitipanDetail', 'id_barang_titipan', 'id');
    }
}