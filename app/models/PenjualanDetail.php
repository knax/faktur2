<?php

/**
 * PenjualanDetail
 *
 * @property-read \Barang $barang
 * @property integer $id
 * @property integer $harga
 * @property integer $unit
 * @property integer $id_penjualan
 * @property integer $id_barang
 * @method static \Illuminate\Database\Query\Builder|\PenjualanDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\PenjualanDetail whereHarga($value)
 * @method static \Illuminate\Database\Query\Builder|\PenjualanDetail whereUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\PenjualanDetail whereIdPenjualan($value)
 * @method static \Illuminate\Database\Query\Builder|\PenjualanDetail whereIdBarang($value)
 * @method static \Model terakhir()
 */
class PenjualanDetail extends Model
{

    protected $table = 'penjualan_detail';
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo('Barang', 'id_barang', 'id')->first();
    }
}