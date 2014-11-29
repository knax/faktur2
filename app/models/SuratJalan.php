<?php

/**
 * SuratJalan
 *
 * @property integer $id
 * @property string $alamat
 * @property integer $id_barang_titipan
 * @property-read \BarangTitipan $barangTitipan
 * @property-read \Illuminate\Database\Eloquent\Collection|\SuratJalanDetail[] $detail
 * @method static \Illuminate\Database\Query\Builder|\SuratJalan whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\SuratJalan whereAlamat($value) 
 * @method static \Illuminate\Database\Query\Builder|\SuratJalan whereIdBarangTitipan($value) 
 * @method static \Model terakhir() 
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class SuratJalan extends Model
{

    protected $table = 'surat_jalan';
    protected $guarded = ['id'];

    public function barangTitipan()
    {
        return $this->belongsTo('BarangTitipan', 'id_barang_titipan', 'id');
    }

    public function detail()
    {
        return $this->hasMany('SuratJalanDetail', 'id_surat_jalan', 'id');
    }

}