<?php

class Pembelian extends Model
{

    protected $table = 'pembelian';
    protected $guarded = ['id'];


    public function detail()
    {
        return $this->hasMany('PembelianDetail', 'id_pembelian', 'id');
    }
}