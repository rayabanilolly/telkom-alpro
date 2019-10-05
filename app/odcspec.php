<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class odcspec extends Model
{
    protected $table = 'odcspec';

    public function odc()
    {
    	return $this->hashMany('App\odc');
    }
}
