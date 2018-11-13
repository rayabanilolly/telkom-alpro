<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gponmerk;
use App\statuscons;
use App\statusinv;

class GponContent extends Controller
{
    public function gponmerk()
    {
    	$data = gponmerk::all();

    	return response()->json(['data' => $data, 200]);
    }

    public function statuscons()
    {
    	$data = statuscons::all();

    	return response()->json(['data' => $data, 200]);
    }

    public function statusinv()
    {
    	$data = statusinv::all();

    	return response()->json(['data' => $data, 200]);
    }
}
