<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = 'project';

    public function odp()
    {
        return $this->hasMany('App\odp', 'project_id', 'id');
    }

    public function mitra()
    {
        return $this->belongsTo('App\mitra', 'mitra_id', 'id');
    }

    public function statusProject()
    {
        return $this->belongsTo('App\statusproj', 'statusproj_id', 'id');
    }
}
