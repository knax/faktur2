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

   /* public function bayarPiutang($banyaknya)
    {
        $this->sisa_piutang = $this->sisa_piutang - $banyaknya;
    }*/
/*
    public function padaTanggal($tanggal = null)
    {
        if( is_null($tanggal) ) {
            $tanggal = (new DateTime())->format('Y-m-d');
        }

        return $this->hasMany('Stok', 'id_barang', 'id')->where('tanggal', '=', $tanggal)->first();

    }*/
}