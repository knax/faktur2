<?php

/**
 * Penjualan
 *
 * @property-read \Pelanggan $pelanggan
 * @property-read \Illuminate\Database\Eloquent\Collection|\PenjualanDetail[] $listBarangTerjual
 * @property-read \Illuminate\Database\Eloquent\Collection|\PenjualanDetail[] $detail
 * @property integer $id
 * @property string $tanggal_penjualan
 * @property boolean $sudah_dibayar
 * @property string $metode_pembayaran
 * @property string $tanggal_pembayaran
 * @property integer $id_pelanggan
 * @method static \Illuminate\Database\Query\Builder|\Penjualan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Penjualan whereTanggalPenjualan($value)
 * @method static \Illuminate\Database\Query\Builder|\Penjualan whereSudahDibayar($value)
 * @method static \Illuminate\Database\Query\Builder|\Penjualan whereMetodePembayaran($value)
 * @method static \Illuminate\Database\Query\Builder|\Penjualan whereTanggalPembayaran($value)
 * @method static \Illuminate\Database\Query\Builder|\Penjualan whereIdPelanggan($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
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