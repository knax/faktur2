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
 * @property boolean $diambilSemua
 * @property integer $id_penjualan
 * @property-read \Penjualan $penjualan
 * @property-read \Illuminate\Database\Eloquent\Collection|\SuratJalan[] $suratJalan
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipan whereDiambilSemua($value) 
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipan whereIdPenjualan($value) 
 */
class BarangTitipan extends Model
{

    protected $table = 'barang_titipan';
    protected $guarded = ['id'];

    public function detail()
    {
        return $this->hasMany('BarangTitipanDetail', 'id_barang_titipan', 'id');
    }

    public function penjualan()
    {
        return $this->belongsTo('Penjualan', 'id_penjualan', 'id');
    }

    public function suratJalan()
    {
        return $this->hasMany('SuratJalan', 'id_barang_titipan', 'id');
    }
}