<?php

/**
 * StokPerpindahan
 *
 * @property integer $id
 * @property integer $id_stok
 * @property integer $unit
 * @method static \Illuminate\Database\Query\Builder|\StokPerpindahan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\StokPerpindahan whereIdStok($value)
 * @method static \Illuminate\Database\Query\Builder|\StokPerpindahan whereUnit($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class StokPerpindahan extends Model
{

    protected $table = 'stok_perpindahan';
    protected $guarded = ['id'];

}