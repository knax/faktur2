<?php

class PembelianDetail extends Model {
    protected $table = 'pembelian_detail';
    protected $guarded = ['id'];

    public function barang(){
        return $this->belongsTo('Barang', 'id_barang', 'id')->first();
    }
}