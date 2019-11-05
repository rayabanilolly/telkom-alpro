<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class odc extends Model
{
    protected $table = 'odc';

    public function odcspec()
    {
    	return $this->belongsTo('App\odcspec', 'odcspec_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo('App\project', 'project_id', 'id');
    }

    public function mitra()
    {
        return $this->belongsTo('App\mitra', 'mitra_id', 'id');
    }
}  
