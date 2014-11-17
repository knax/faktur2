<?php

class PenjualanDetail extends Model
{

    protected $table = 'penjualan_detail';
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo('Barang', 'id_barang', 'id')->first();
    }
}