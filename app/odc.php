<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class odc extends Model
{
    protected $table = 'odc';

    public function odcspec()
    {
    	return $this->belongsTo('App\odcspec');
    }
}
