<?php

/**
 * TipeUserHakAkses
 *
 * @property integer $id
 * @property integer $id_tipe_user
 * @property integer $id_hak_akses
 * @method static \Illuminate\Database\Query\Builder|\TipeUserHakAkses whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipeUserHakAkses whereIdTipeUser($value)
 * @method static \Illuminate\Database\Query\Builder|\TipeUserHakAkses whereIdHakAkses($value)
 * @method static \Model terakhir()
 * @method static \Model hariIni()
 * @method static \Model tanggal($tanggal)
 * @method static \Model tanggalText($tanggal)
 */
class TipeUserHakAkses extends Model
{

    protected $table = 'tipe_user_hak_akses';
    protected $guarded = ['id'];

}