<?php

/**
 * PembelianDetail
 *
 * @property-read \Barang $barang
 * @property integer $id
 * @property integer $unit
 * @property integer $id_pembelian
 * @property integer $id_barang
 * @method static \Illuminate\Database\Query\Builder|\PembelianDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\PembelianDetail whereUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\PembelianDetail whereIdPembelian($value)
 * @method static \Illuminate\Database\Query\Builder|\PembelianDetail whereIdBarang($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 */
class PembelianDetail extends Model
{

    protected $table = 'pembelian_detail';
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo('Barang', 'id_barang', 'id');
    }
}