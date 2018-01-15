<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class seller_info extends Model
{
    //属于
    public function log()
    {
        return $this->belongsTo('App\Model\seller_log','id');
    }
}
