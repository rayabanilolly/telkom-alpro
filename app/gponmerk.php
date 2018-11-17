<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gponmerk extends Model
{
    protected $table = 'gponmerk';

    public function gpon()
    {
    	return $this->hashMany('App\gpon');
    }
}
