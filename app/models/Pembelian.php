<?php

class Pembelian extends Model
{

    protected $table = 'pembelian';
    protected $guarded = ['id'];

    public static function belumDibayar()
    {
        return self::where('sudah_dibayar', '=', '0')->get();
    }

    public function pelanggan()
    {
        return $this->belongsTo('Pelanggan', 'id_pelanggan', 'id')->first();
    }

    public function listBarangTerbeli()
    {
        return $this->hasMany('PembelianDetail', 'id_pembelian', 'id')->get();
    }

    public function totalHarga()
    {
        $totalHarga = 0;
        foreach ($this->listBarangTerbeli() as $pembelianDetail) {
            $totalHarga += $pembelianDetail->unit * $pembelianDetail->harga;
        }

        return $totalHarga;
    }

    public function bukanPelangganTetap()
    {
        return ($this->id_pelanggan != 1);
    }
}