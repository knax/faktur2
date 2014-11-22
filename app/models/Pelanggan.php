<?php

/**
 * Pelanggan
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\PembayaranPiutang[] $pembayaran
 * @property-read \Illuminate\Database\Eloquent\Collection|\Piutang[] $piutang
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $nomor_telepon
 * @property string $keterangan
 * @method static \Illuminate\Database\Query\Builder|\Pelanggan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pelanggan whereNama($value)
 * @method static \Illuminate\Database\Query\Builder|\Pelanggan whereAlamat($value)
 * @method static \Illuminate\Database\Query\Builder|\Pelanggan whereNomorTelepon($value)
 * @method static \Illuminate\Database\Query\Builder|\Pelanggan wherePiutang($value)
 * @method static \Illuminate\Database\Query\Builder|\Pelanggan whereKeterangan($value)
 * @method static \Model terakhir()
 */
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