<?php

class Pelanggan extends Model
{

    protected $table = 'pelanggan';
    protected $guarded = ['id'];

    public function pembayaran()
    {
        return $this->hasMany('PembayaranPiutang', 'id_pelanggan', 'id');
    }

    public function piutang($tanggal = null)
    {
        if($tanggal == null) {
            $tanggal = (new DateTime())->format('Y-m-d');
        }
        return $this->hasMany('Piutang', 'id_pelanggan', 'id')->where('tanggal', '=', $tanggal)->first();
    }


    public function bayarPiutang($banyaknya, $metodePembayaran)
    {
        $piutang = $this->piutang((new DateTime())->format('Y-m-d'));

        if( is_null($piutang) ) {
            $piutang = new Piutang();
            $piutang->tanggal = (new DateTime())->format('Y-m-d');
            $piutang->sisa_piutang = $this->piutang((new DateTime())->modify('-1 days')->format('Y-m-d'));
            $piutang->id_pelanggan = $this->id;
            $piutang->save();
        }

        $piutang->sisa_piutang = $piutang->sisa_piutang - $banyaknya;

        $piutang->save();

        $pembayaranPiutang = new PembayaranPiutang();

        $pembayaranPiutang->jumlah = $banyaknya;
        $pembayaranPiutang->metode = $metodePembayaran;
        $pembayaranPiutang->tanggal = (new DateTime())->format('Y-m-d');
        $pembayaranPiutang->id_piutang = $piutang->id;

        $pembayaranPiutang->save();
    }
}