<?php

class Pelanggan extends Model
{

    protected $table = 'pelanggan';
    protected $guarded = ['id'];

    public function pembayaran()
    {
        return $this->hasMany('PembayaranPiutang', 'id_pelanggan', 'id');
    }

    public function bayarHutang($banyaknya)
    {
        $this->piutang = $this->piutang - $banyaknya;
    }
}