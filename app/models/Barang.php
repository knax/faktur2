<?php

class Barang extends Model {
    protected $table = 'barang';
	protected $guarded = ['id'];

    public function rangeHarga()
    {
        return ($this->harga + ($this->harga * $this->batas_keuntungan_bawah / 100)) . '-' . ($this->harga + ($this->harga * $this->batas_keuntungan_atas / 100));
    }
}