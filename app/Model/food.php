<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    //形同分类表与食物表属于
     public function cate()
    {
        return $this->belongsTo('App\Model\system','uid');
    }
}
