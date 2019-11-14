<?php

namespace App\Http\Controllers;

use App\odp;
use Illuminate\Http\Request;

class OdpContent extends Controller
{
    public function odp($odc_id) 
    {
        $data = odp::where('odc_id', $odc_id)
                    ->with('odc', 'distribution', 'regional', 'witel', 'sto', 'mitra')
                    ->get();

        $response = [
            'data' => $data,
            'status' => true
        ];

        return response($response);
    }

    public function edit(Request $request) 
    {
        $request    = $request->json();
        $id         = $request->get('id');

        $odp = odp::find($id);

        $odp->name          = $request->get('name');
        $odp->frame         = $request->get('frame');
        $odp->power         = $request->get('power');
        $odp->panel_in      = $request->get('panel_in');
        $odp->port_in       = $request->get('port_in');
        $odp->panel_out     = $request->get('panel_out');
        $odp->port_out      = $request->get('port_out');
        $odp->lat           = $request->get('latitude');
        $odp->lng           = $request->get('longitude');
        $odp->mitra_id      = $request->get('mitra_id');
        $odp->statuscons_id = $request->get('statuscons_id');
        $odp->statusinv_id  = $request->get('statusinv_id');

        $odp->update();

        $response = [
            'status' => true
        ];

        return response($response);
    }
}
