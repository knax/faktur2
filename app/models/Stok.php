<?php

/**
 * Stok
 *
 * @property-read \Barang $barang
 * @property integer $id
 * @property integer $id_barang
 * @property integer $stok
 * @property string $tanggal
 * @method static \Illuminate\Database\Query\Builder|\Stok whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Stok whereIdBarang($value)
 * @method static \Illuminate\Database\Query\Builder|\Stok whereStok($value)
 * @method static \Illuminate\Database\Query\Builder|\Stok whereTanggal($value)
 * @method static \Stok hariIni()
 * @method static \Stok tanggal($tanggal)
 * @method static \Stok terakhir()
 * @property-read \Illuminate\Database\Eloquent\Collection|\StokPerpindahan[] $stokPerpindahan
 */
class Stok extends Model
{

    protected $table = 'stok';
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo('Barang', 'id_barang', 'id');
    }

    public function stokPerpindahan()
    {
        return $this->hasMany('StokPerpindahan', 'id_stok', 'id');
    }
}