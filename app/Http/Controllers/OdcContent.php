<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\odc;
use App\odcspec;
use App\typeproj;

class OdcContent extends Controller
{
    public function odc(Request $request)
    {
    	$data = odc::where('sto_id', $request->sto)
                    ->with('odcspec', 'project', 'mitra')
                    ->get();

    	return response()->json(['data' => $data], 200);
    }

    public function odcspec()
    {
    	$data = odcspec::all();

    	return response()->json(['data' => $data], 200);
    }

    public function odcshow($id)
    {
        $data = odc::find($id);

        return response()->json(['data' => $data], 200);
    }

    public function typeproject()
    {
    	$data = typeproj::all();

    	return response()->json(['data' => $data], 200);
    }
}
