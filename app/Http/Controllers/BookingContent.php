<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mitra;
use App\typeproj;
use App\regional;
use App\witel;
use App\sto;
use App\odcspec;
use App\distribution;
use App\odc;

class BookingContent extends Controller
{
    public function mitra()
    {
    	$data = mitra::all();

    	return response()->json(['data' => $data], 200);
    }

    public function typeproj()
    {
    	$data = typeproj::all();

    	return response()->json(['data' => $data], 200);
    }

    public function regional()
    {
    	$data = regional::all();

    	return response()->json(['data' => $data], 200);
    }

    public function witel($regional_id)
    {
    	$data = witel::where('regional_id', $regional_id)->get();

    	return response()->json(['data' => $data], 200);
    }

    public function sto($witel_id)
    {
    	$data = sto::where('witel_id', $witel_id)->get();

    	return response()->json(['data' => $data], 200);
    }

    public function odcspec()
    {
    	$data = odcspec::all();

    	return response()->json(['data' => $data], 200);
    }

    public function odc($sto_id)
    {
    	$data = odc::where('sto_id', $sto_id)->get();

    	return response()->json(['data' => $data], 200);
    }

    public function distribution($odc_id)
    {
    	$data = distribution::where('odc_id', $odc_id)->get();

    	return response()->json(['data' => $data], 200);
    }
}
