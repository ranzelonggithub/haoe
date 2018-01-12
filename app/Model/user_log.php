<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class user_log extends Model
{
    // 一对一
    public function userlogin()
    {
        return $this->hasOne('App\Model\user_info','uid');
    }
}
