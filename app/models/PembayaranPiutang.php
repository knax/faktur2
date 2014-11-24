<?php

/**
 * PembayaranPiutang
 *
 * @property-read \Pelanggan $pelanggan
 * @property integer $id
 * @property integer $jumlah
 * @property string $metode
 * @property string $tanggal
 * @property integer $id_piutang
 * @method static \Illuminate\Database\Query\Builder|\PembayaranPiutang whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\PembayaranPiutang whereJumlah($value)
 * @method static \Illuminate\Database\Query\Builder|\PembayaranPiutang whereMetode($value)
 * @method static \Illuminate\Database\Query\Builder|\PembayaranPiutang whereTanggal($value)
 * @method static \Illuminate\Database\Query\Builder|\PembayaranPiutang whereIdPiutang($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class PembayaranPiutang extends Model
{

    protected $table = 'pembayaran_piutang';
    protected $guarded = ['id'];

    public function pelanggan()
    {
        return $this->belongsTo('Pelanggan', 'id', 'id_pelanggan');
    }
}