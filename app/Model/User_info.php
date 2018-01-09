<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    //属于
    public function userinfo()
    {
        return $this->belongsTo('App\Model\User_Log','uid');
    }
}
