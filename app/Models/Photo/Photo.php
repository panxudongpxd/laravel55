<?php

namespace App\Models\Photo;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $table = 'bk_photo';

    public static function picture()
	{
	    return $this->hasMany('App\Models\Picture\Picture','uid');
	}
}
