<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
	public $table = 'comments';
	
	public $timestamps = false;
	
	protected $dateFormat = 'U';
}
