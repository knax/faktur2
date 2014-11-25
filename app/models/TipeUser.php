<?php

/**
 * TipeUser
 *
 * @property integer $id
 * @property string $nama
 * @property-read \Illuminate\Database\Eloquent\Collection|\HakAkses[] $hakAkses
 * @method static \Illuminate\Database\Query\Builder|\TipeUser whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\TipeUser whereNama($value) 
 * @method static \Model terakhir() 
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class TipeUser extends Model
{

    protected $table = 'tipe_user';
    protected $guarded = ['id'];

    public function hakAkses(){
        return $this->belongsToMany('HakAkses', 'tipe_user_hak_akses', 'id_tipe_user', 'id_hak_akses');
    }

}