<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function comment()
    {
    return $this->hasOne('App\Model\comment','oid');
    }
}
