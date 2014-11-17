<?php

class Stok extends Model
{

    protected $table = 'stok';
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo('Barang', 'id_barang', 'id');
    }
}