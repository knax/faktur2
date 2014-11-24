<?php

/**
 * Piutang
 *
 * @property-read \Pembelian $pelanggan
 * @property-read \Illuminate\Database\Eloquent\Collection|\PembayaranPiutang[] $pembayaran
 * @property integer $id
 * @property string $tanggal
 * @property string $jatuh_tempo
 * @property integer $sisa_piutang
 * @property integer $id_pelanggan
 * @method static \Illuminate\Database\Query\Builder|\Piutang whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Piutang whereTanggal($value)
 * @method static \Illuminate\Database\Query\Builder|\Piutang whereJatuhTempo($value)
 * @method static \Illuminate\Database\Query\Builder|\Piutang whereSisaPiutang($value)
 * @method static \Illuminate\Database\Query\Builder|\Piutang whereIdPelanggan($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class Piutang extends Model
{

    protected $table = 'piutang';
    protected $guarded = ['id'];

    public function pelanggan()
    {
        return $this->hasOne('Pembelian', 'id', 'id_pembelian');
    }

    public function pembayaran()
    {
        return $this->hasMany('PembayaranPiutang', 'id_piutang', 'id');
    }

}