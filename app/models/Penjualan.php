<?php

class Penjualan extends Model
{

    protected $table = 'penjualan';
    protected $guarded = ['id'];

    public static function belumDibayar()
    {
        return self::where('sudah_dibayar', '=', '0')->get();
    }

    public function pelanggan()
    {
        return $this->belongsTo('Pelanggan', 'id_pelanggan', 'id')->first();
    }

    public function totalHarga()
    {
        $totalHarga = 0;
        foreach ($this->listBarangTerjual() as $penjualanDetail) {
            $totalHarga += $penjualanDetail->unit * $penjualanDetail->harga;
        }

        return $totalHarga;
    }

    public function listBarangTerjual()
    {
        return $this->hasMany('PenjualanDetail', 'id_penjualan', 'id')->get();
    }

    public function bukanPelangganTetap()
    {
        return ($this->id_pelanggan != 1);
    }

    public function detail()
    {
        return $this->hasMany('PenjualanDetail', 'id_penjualan', 'id');
    }
}