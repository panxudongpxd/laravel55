<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taginfo extends Model
{
    public $table = 'bk_tag_info';

    public function Articles()        //代表一个人收藏多件商品
   		{
       		return $this->belongsToMany('App\Models\Articles\Articles','bk_tag_info','gid','tid');
    	}
}
