<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class odp extends Model
{
    protected $table = 'odp';

    public function odc()
    {
        return $this->belongsTo('App\odc', 'odc_id', 'id');
    }

    public function distribution()
    {
        return $this->belongsTo('App\distribution', 'distribution_id', 'id');
    }

    public function regional()
    {
        return $this->belongsTo('App\regional', 'regional_id', 'id');
    }

    public function witel()
    {
        return $this->belongsTo('App\witel', 'witel_id', 'id');
    }

    public function statusinv()
    {
        return $this->belongsTo('App\statusinv', 'statusinv_id', 'id');
    }

    public function statuscons()
    {
        return $this->belongsTo('App\statuscons', 'statuscons_id', 'id');
    }

    public function sto()
    {
        return $this->belongsTo('App\sto', 'sto_id', 'id');
    }

    public function mitra()
    {
        return $this->belongsTo('App\mitra', 'mitra_id', 'id');
    }
}
