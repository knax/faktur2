<?php

/**
 * BarangTitipanDetail
 *
 * @property integer $id
 * @property string $nama
 * @property integer $unit
 * @property integer $id_barang_titipan
 * @property-read \BarangTitipan $barangTitipan
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipanDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipanDetail whereNama($value)
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipanDetail whereUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipanDetail whereIdBarangTitipan($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 * @property integer $id_barang
 * @property-read \Barang $barang
 * @method static \Illuminate\Database\Query\Builder|\BarangTitipanDetail whereIdBarang($value) 
 */
class BarangTitipanDetail extends Model
{

    protected $table = 'barang_titipan_detail';
    protected $guarded = ['id'];

    public function barangTitipan()
    {
        return $this->belongsTo('BarangTitipan', 'id_barang_titipan', 'id');
    }

    public function barang()
    {
        return $this->belongsTo('Barang', 'id_barang', 'id');
    }

    public function kurangiUnit($banyaknya)
    {
        $this->unit = $this->unit - $banyaknya;
        if($this->unit <= 0) {
            var_dump($this->unit);
            return $this->delete();
        }
        $this->save();
        return $this;
    }
}