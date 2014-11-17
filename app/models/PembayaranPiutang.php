<?php

class PembayaranPiutang extends Model
{

    protected $table = 'pembayaran_piutang';
    protected $guarded = ['id'];

    public function pelanggan()
    {
        return $this->belongsTo('Pelanggan', 'id', 'id_pelanggan');
    }
}