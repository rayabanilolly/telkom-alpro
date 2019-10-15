<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sto extends Model
{
    protected $table = 'sto';

    public function witel()
    {
    	return $this->belongsTo('App\witel', 'witel_id');
    }
}
