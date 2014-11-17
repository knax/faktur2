<?php

class PembayaranHutang extends Model
{

    protected $table = 'pembayaran_hutang';
    protected $guarded = ['id'];

    public function pembelian()
    {
        return $this->belongsTo('Hutang', 'id', 'id_hutang');
    }
}