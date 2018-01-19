<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function order()
    {
    return $this->belongsTo('App\Model\order','oid');
    }
}
