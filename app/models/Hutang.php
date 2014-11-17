<?php

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