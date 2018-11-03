<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gpon extends Model
{
    protected $table = 'gpon';

    public function gponmerks()
    {
    	return $this->hasMany('App\gponmerk');
    }
}
