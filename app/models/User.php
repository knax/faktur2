<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

/**
 * User
 *
 * @property integer $id
 * @property string $full_name
 * @property string $username
 * @property string $password
 * @property string $tipe
 * @property string $remember_token
 * @method static \Illuminate\Database\Query\Builder|\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereFullName($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereTipe($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereRememberToken($value)
 * @method static \Model terakhir()
 * @property integer $id_tipe_user
 * @method static \Illuminate\Database\Query\Builder|\User whereIdTipeUser($value) 
 * @method static \Model hariIni() 
 * @method static \Model tanggal($tanggal) 
 * @method static \Model tanggalText($tanggal) 
 */
class User extends Model implements UserInterface
{

    use UserTrait;

    protected $table = 'users';
    protected $guarded = ['id'];
    protected $hidden = ['password'];

    public function tipeUser()
    {
        return $this->belongsTo('TipeUser', 'id_tipe_user', 'id');
    }
    
}