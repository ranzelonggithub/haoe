<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class seller_log extends Model
{
    public function seller_info()
    {
    	return $this->hasOne('App\Model\seller_info','uid');
    }
}
