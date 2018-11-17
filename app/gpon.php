<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gpon extends Model
{
    protected $table = 'gpon';

    public function gponmerk()
    {
    	return $this->belongsTo('App\gponmerk');
    }
}
