<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    //属于
    public function userinfo()
    {
        return $this->belongsTo('App\Model\user_Log','id');
    }
}
