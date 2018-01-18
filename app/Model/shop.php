<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    public function systemCate()
    {
    	return $this->belongsTo('App\Model\system','shopCate');
    }
}
