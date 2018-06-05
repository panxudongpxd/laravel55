<?php

namespace App\Models\Stalk;

use Illuminate\Database\Eloquent\Model;

class Stalk extends Model
{
    //配置这个模型操作的表
    public $table = 'bk_stalk';

    // 与从表建立一对一
    public function stalkinfo(){
        return $this-> hasOne('App\models\Stalkinfo\Stalkinfo','sid');
    }

    // 与admin表建立属于关系
    public function guser()
    {
        return $this->belongsTo('App\User','aid');
    }

}
