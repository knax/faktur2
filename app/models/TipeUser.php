<?php

class TipeUser extends Model
{

    protected $table = 'tipe_user';
    protected $guarded = ['id'];

    public function hakAkses(){
        return $this->belongsToMany('HakAkses', 'tipe_user_hak_akses', 'id_tipe_user', 'id_hak_akses');
    }

}