<?php

/**
 * Barang
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\PembelianDetail[] $pembelian
 * @property-read \Illuminate\Database\Eloquent\Collection|\PenjualanDetail[] $penjualan
 * @property-read \Illuminate\Database\Eloquent\Collection|\Stok[] $stok
 * @property integer $id
 * @property string $nama
 * @property integer $harga
 * @property string $batas_keuntungan_atas
 * @property string $batas_keuntungan_bawah
 * @method static \Illuminate\Database\Query\Builder|\Barang whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Barang whereNama($value)
 * @method static \Illuminate\Database\Query\Builder|\Barang whereHarga($value)
 * @method static \Illuminate\Database\Query\Builder|\Barang whereBatasKeuntunganAtas($value)
 * @method static \Illuminate\Database\Query\Builder|\Barang whereBatasKeuntunganBawah($value)
 * @method static \Model terakhir()
 */
class Barang extends Model
{

    const STOK_KURANGI = 'kurangi';
    const STOK_TAMBAH = 'tambah';

    protected $table = 'barang';
    protected $guarded = ['id'];

    /**
     * @return string
     */
    public function rangeHarga()
    {
        return $this->hargaBawah() . '-' . $this->hargaAtas();
    }

    /**
     * @return int
     */
    public function hargaBawah()
    {
        return $this->harga + ($this->harga * $this->batas_keuntungan_bawah / 100);
    }

    /**
     * @return int
     */
    public function hargaAtas()
    {
        return $this->harga + ($this->harga * $this->batas_keuntungan_atas / 100);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pembelian()
    {
        return $this->hasMany('PembelianDetail', 'id_barang', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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

    /**
     * @param $banyaknya
     */
    public function tambahStok($banyaknya)
    {
        $this->modifikasiStok($banyaknya, self::STOK_TAMBAH);
    }

    /**
     * @param $banyaknya
     */
    public function kurangiStok($banyaknya)
    {
        $this->modifikasiStok($banyaknya, self::STOK_KURANGI);
    }

    /**
     * @param $banyaknya
     * @param $tipe
     */
    public function modifikasiStok($banyaknya, $tipe)
    {
        $stok = $this->stokTerakhir();
        if( $tipe == self::STOK_KURANGI ) {
            $stok->stok = $stok->stok - $banyaknya;
        } elseif( $tipe == self::STOK_TAMBAH ) {
            $stok->stok = $stok->stok + $banyaknya;
        }
        $stok->save();

        $stokPerpindahan = new StokPerpindahan();

        if( $tipe == 'kurangi' ) {
            $stokPerpindahan->unit = 0 - $banyaknya;
        } elseif( $tipe == 'tambah' ) {
            $stokPerpindahan->unit = $banyaknya;
        }

        $stok->stokPerpindahan()->save($stokPerpindahan);

    }

    /*    public function modifikasiStok($banyaknya)
        {
            $hariIni = new DateTime();

            $stok = $this->stok($hariIni->format(NORMAL_DATE));

            if( is_null($stok) ) {
                $stok = new Stok();
                $stok->tanggal = $hariIni->format(NORMAL_DATE);
                $stok->stok = $this->stok($hariIni->modify('-1 days')->format(NORMAL_DATE));

                $this->stok()->save($stok);
            }

            $stok->stok = $stok->stok - $banyaknya;

            $stok->save();

            $stokPerpindahan = new StokPerpindahan();

            $stokPerpindahan->id_stok = $stok->id;
            $stokPerpindahan->unit = 0 - $banyaknya;

            $stokPerpindahan->save();

        }*/

    public function stok()
    {
        return $this->hasMany('Stok', 'id_barang', 'id');
    }

    /**
     * @return Stok
     */
    public function stokHariIni()
    {
        return $this->stok()->hariIni()->first();
    }

    public function stokTerakhir()
    {
        $stok = $this->stok()->hariIni()->first();

        if( is_null($stok) ) {
            $stok = new Stok();

            $stok->stok = $this->stok()->terakhir()->stok;
            $stok->tanggal = (new DateTime())->format(NORMAL_DATE);

            $this->stok()->save($stok);
        }

        return $stok;
    }

    //
    //    public function stok($tanggal = null)
    //    {
    //        if( is_null($tanggal) ) {
    //            $tanggal = (new DateTime())->format('Y-m-d');
    //        }
    //
    //        return $this->hasMany('Stok', 'id_barang', 'id')->where('tanggal', '=', $tanggal)->first();
    //
    //    }
}