<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'bk_users';

    public function userinfo(){
        return $this-> hasOne('App\models\Userinfo','uid');
    }
}
