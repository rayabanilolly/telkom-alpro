<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gpon;
use App\odf;

class OdfContent extends Controller
{
    public function odf(Request $request)
    {
    	$data = odf::where('sto_id', $request->sto)->get();

    	return response()->json(['data' => $data], 200);
    }

    public function odfadd(Request $request)
    {
    	$lokasi = explode(',', $request->lokasi);

        $odf = new odf;
        $odf->unique = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'), 0, 10);
        $odf->name = $request->name;
        $odf->regional_id = $request->regional_id;
        $odf->witel_id = $request->witel_id;
        $odf->sto_id = $request->sto_id;
        $odf->mitra_id = $request->mitra_id;
        $odf->statuscons_id = $request->statuscons_id;
        $odf->statusinv_id = $request->statusinv_id;
        $odf->lat = $lokasi[0];
        $odf->lng = $lokasi[1];
        $odf->save();

        return response()->json(['data' => $odf], 200);
    }

    public function odfshow($id)
    {
    	$data = odf::findOrFail($id);

        return response()->json(['data' => $data], 200);
    }

    public function odfedit(Request $request, $id)
    {
    	$lokasi = explode(',', $request->lokasi);

        $data = odf::findOrFail($id);
        $data->name = $request->name;
        $data->regional_id = $request->regional_id;
        $data->witel_id = $request->witel_id;
        $data->sto_id = $request->sto_id;
        $data->mitra_id = $request->mitra_id;
        $data->statuscons_id = $request->statuscons_id;
        $data->statusinv_id = $request->statusinv_id;
        $data->lat = $lokasi[0];
        $data->lng = $lokasi[1];
        $data->save();

        return response()->json(['data' => $data], 200);
    }
}
