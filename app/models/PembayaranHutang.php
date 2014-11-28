<?php

/**
 * PembayaranHutang
 *
 * @property-read \Hutang $pembelian
 * @property integer $id
 * @property integer $jumlah
 * @property string $metode
 * @property string $tanggal
 * @property integer $id_hutang
 * @method static \Illuminate\Database\Query\Builder|\PembayaranHutang whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\PembayaranHutang whereJumlah($value)
 * @method static \Illuminate\Database\Query\Builder|\PembayaranHutang whereMetode($value)
 * @method static \Illuminate\Database\Query\Builder|\PembayaranHutang whereTanggal($value)
 * @method static \Illuminate\Database\Query\Builder|\PembayaranHutang whereIdHutang($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 */
class PembayaranHutang extends Model
{

    protected $table = 'pembayaran_hutang';
    protected $guarded = ['id'];

    public function pembelian()
    {
        return $this->belongsTo('Hutang', 'id', 'id_hutang');
    }
}