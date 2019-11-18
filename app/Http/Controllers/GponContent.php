<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gponmerk;
use App\statuscons;
use App\statusinv;
use App\gpon;

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

    public function gpon(Request $request)
    {
        $data = gpon::where('sto_id', $request->sto)->get();
        $merk = array(); $i = 0;

        foreach($data as $index):
            $merk[] = gponmerk::find($index->gponmerk_id)->toArray();
            $data[$i]->merk = $merk[$i];
            $i++;
        endforeach;

        return response()->json(['data' => $data, 200]);
    }

    public function getGpon($sto_id) {

        $response = null;

        $gpons = gpon::where('sto_id', $sto_id)
                    ->get();

        if ($gpons !== null) {
            
            $response = [
                'data' => $gpons,
                'status' => true
            ];
        }

        return response($response);
    }

    public function gponadd(Request $request)
    {
        $lokasi = explode(',', $request->lokasi);

        $gpon = new gpon;
        $gpon->unique = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'), 0, 10);
        $gpon->name = $request->name;
        $gpon->address = $request->address;
        $gpon->gponmerk_id = $request->gponmerk_id;
        $gpon->regional_id = $request->regional_id;
        $gpon->witel_id = $request->witel_id;
        $gpon->sto_id = $request->sto_id;
        $gpon->mitra_id = $request->mitra_id;
        $gpon->statuscons_id = $request->statuscons_id;
        $gpon->statusinv_id = $request->statusinv_id;
        $gpon->lat = $lokasi[0];
        $gpon->lng = $lokasi[1];
        $gpon->save();

        return response()->json(['data' => $gpon], 200);
    }

    public function gponshow($id)
    {  
        $data = gpon::findOrFail($id);

        return response()->json(['data' => $data], 200);
    }

    public function gponedit(Request $request, $id)
    {
        $lokasi = explode(',', $request->lokasi);

        $data = gpon::findOrFail($id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->gponmerk_id = $request->gponmerk_id;
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
