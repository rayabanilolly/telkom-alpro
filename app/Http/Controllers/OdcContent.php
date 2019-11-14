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

    public function allOdc($sto_id)
    {
        $data = odc::where('sto_id', $sto_id)
                    ->get();

        $response = [
            'data' => $data,
            'status' => true
        ];

        return response($response);
    }

    public function odcedit(Request $request)
    {
        $request = $request->json();

        $id = $request->get('id');

        $odc                = odc::find($id);
        $odc->name          = $request->get('name');
        $odc->odcspec_id    = $request->get('odcspec_id');
        $odc->mitra_id      = $request->get('mitra_id');
        $odc->statuscons_id = $request->get('statuscons_id');
        $odc->statusinv_id  = $request->get('statusinv_id');

        $odc->update();

        $response = [
            'status' => true
        ];

        return response($response);
    }

    public function odcspec()
    {
    	$data = odcspec::all();

    	return response()->json(['data' => $data], 200);
    }

    public function odcshow($id)
    {
        $data = odc::where('id', $id)
                    ->with('odcspec', 'project', 'mitra')
                    ->get();

        return response()->json(['data' => $data], 200);
    }

    public function typeproject()
    {
    	$data = typeproj::all();

    	return response()->json(['data' => $data], 200);
    }
}
