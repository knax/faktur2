<?php

class Barang extends Model
{

    protected $table = 'barang';
    protected $guarded = ['id'];

    public function rangeHarga()
    {
        return ($this->harga + ($this->harga * $this->batas_keuntungan_bawah / 100)) . '-' . ($this->harga + ($this->harga * $this->batas_keuntungan_atas / 100));
    }

    public function pembelian()
    {
        return $this->hasMany('PembelianDetail', 'id_barang', 'id');
    }

    public function penjualan()
    {
        return $this->hasMany('PenjualanDetail', 'id_barang', 'id');
    }

    public static function barangTerjual($tanggal)
    {
        $listPenjualan = Penjualan::where('tanggal_penjualan', '=', $tanggal);

        $listTerjual = [];
        $listBarang = static::all();

        foreach ($listBarang as $barang) {
            $terjual = [
                'nama_barang'  => $barang->nama,
                'unit_terjual' => 0
            ];
            $listTerjual[$barang->id] = $terjual;
        }

        foreach ($listPenjualan->get() as $penjualan) {
            foreach ($penjualan->detail as $penjualanDetail) {
                $listTerjual[$penjualanDetail->barang()->id]['unit_terjual'] += $penjualanDetail->unit;
            }
        }

        return $listTerjual;
    }
}