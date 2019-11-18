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

    public function gpon_inservice()
    {
        return $this->hasMany('App\gpon', 'sto_id', 'id');
    }

    public function gpon_planned()
    {
        return $this->hasMany('App\gpon', 'sto_id', 'id');
    }

    public function odc_inservice()
    {
        return $this->hasMany('App\odc', 'sto_id', 'id');
    }

    public function odc_planned()
    {
        return $this->hasMany('App\odc', 'sto_id', 'id');
    }

    public function odp_inservice()
    {
        return $this->hasMany('App\odp', 'sto_id', 'id');
    }

    public function odp_planned()
    {
        return $this->hasMany('App\odp', 'sto_id', 'id');
    }
}
