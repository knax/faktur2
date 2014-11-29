<?php

/**
 * SuratJalanDetail
 *
 * @property integer $id
 * @property integer $unit
 * @property integer $id_barang
 * @property-read \SuratJalan $suratJalan
 * @method static \Illuminate\Database\Query\Builder|\SuratJalanDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\SuratJalanDetail whereUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\SuratJalanDetail whereIdBarang($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 */
class SuratJalanDetail extends Model
{

    protected $table = 'surat_jalan_detail';
    protected $guarded = ['id'];

    public function suratJalan()
    {
        return $this->belongsTo('SuratJalan', 'id_surat_jalan', 'id');
    }

    public function barang()
    {
        return $this->belongsTo('Barang', 'id_barang', 'id');
    }

}