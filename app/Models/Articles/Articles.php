<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
   	protected $table = 'bk_articles';

   	public function content()
	    {
	        // 一对一
	        return $this->hasOne('App\Models\Content\Content','aid');
	    }
	//属于
	public function Cate()          
	    {
	        return $this->belongsTo('App\Models\Admin\Cate','uid');
	    }

	public function Taginfo()        //代表一个人收藏多件商品
   		{
       		return $this->belongsToMany('App\Models\Taginfo','bk_tag_info','tid','gid');
    	}

}
