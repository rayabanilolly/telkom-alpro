<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class witel extends Model
{	
    protected $table = 'witel';

    public function regional()
    {
    	return $this->belongsTo('App\regional', 'regional_id');
    }
}
