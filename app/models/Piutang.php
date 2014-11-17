<?php

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