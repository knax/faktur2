<?php

/**
 * Pembelian
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\PembelianDetail[] $detail
 * @property integer $id
 * @property string $nama_supplier
 * @property string $metode_pembayaran
 * @property string $tanggal_pembelian
 * @method static \Illuminate\Database\Query\Builder|\Pembelian whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pembelian whereNamaSupplier($value)
 * @method static \Illuminate\Database\Query\Builder|\Pembelian whereMetodePembayaran($value)
 * @method static \Illuminate\Database\Query\Builder|\Pembelian whereTanggalPembelian($value)
 * @method static \Model terakhir()
 */
class Pembelian extends Model
{

    protected $table = 'pembelian';
    protected $guarded = ['id'];


    public function detail()
    {
        return $this->hasMany('PembelianDetail', 'id_pembelian', 'id');
    }
}