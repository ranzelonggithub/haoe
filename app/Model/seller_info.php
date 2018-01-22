<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class seller_info extends Model
{
<<<<<<< HEAD
    //
=======
    //属于
    public function log()
    {
        return $this->belongsTo('App\Model\seller_log','id');
    }
>>>>>>> f1c4fea703e0a057a31064cc4e83447c183d0289
}
