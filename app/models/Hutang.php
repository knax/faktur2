<?php

/**
 * Hutang
 *
 * @property-read \Pembelian $pembelian
 * @property-read \Illuminate\Database\Eloquent\Collection|\PembayaranHutang[] $pembayaran
 * @method static \Hutang padaTanggal($tanggal)
 * @property integer $id
 * @property string $jatuh_tempo
 * @property string $tanggal
 * @property integer $sisa_hutang
 * @property integer $id_pembelian
 * @method static \Illuminate\Database\Query\Builder|\Hutang whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Hutang whereJatuhTempo($value)
 * @method static \Illuminate\Database\Query\Builder|\Hutang whereTanggal($value)
 * @method static \Illuminate\Database\Query\Builder|\Hutang whereSisaHutang($value)
 * @method static \Illuminate\Database\Query\Builder|\Hutang whereIdPembelian($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class Hutang extends Model
{

    protected $table = 'hutang';
    protected $guarded = ['id'];

    public function pembelian()
    {
        return $this->hasOne('Pembelian', 'id', 'id_pembelian');
    }

    public function pembayaran()
    {
        return $this->hasMany('PembayaranHutang', 'id_hutang', 'id');
    }

    public function bayarHutang($banyaknya)
    {
        $this->sisa_hutang = $this->sisa_hutang - $banyaknya;
    }

    public function scopePadaTanggal($query, $tanggal)
    {
        if( is_null($tanggal) ) {
            $tanggal = (new DateTime())->format('Y-m-d');
        }

        return $query->where('tanggal', '=', $tanggal);

    }


}