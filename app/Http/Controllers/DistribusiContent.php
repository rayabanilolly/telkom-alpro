<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OdcPort;
use App\distribution;
use App\odc;
use App\odp;

class DistribusiContent extends Controller
{
    public function oneodc(Request $request)
    {
        $odc_id = $request->odc_id;
        $panelofodc = array();
        $portofpanel = array();
        $panelontemp = array();
        $portontemp = array();

        $odc              = odc::find($odc_id);
        $distribution     = distribution::where(['odc_id' => $odc_id, 'panel1' => 0])->get();
        $alldistributions = distribution::where('odc_id', $odc_id)->get();
        $listdistribution = distribution::where('odc_id', $odc_id)->get();

        $capacityofodc = intval(preg_replace('/[^0-9]+/', '', $odc->odcspec->name), 10);
        $countpanelofodc = ($capacityofodc / 12);

        for($x = 1; $x <= $countpanelofodc; $x++):

            $panelontemp = distribution::where(['odc_id' => $odc_id, 'panel1' => $x])->first();

            if(!$panelontemp):
                $panelontemp = distribution::where(['odc_id' => $odc_id, 'panel2' => $x])->first();
            endif;

            for($y = 0; $y < 12; $y++):

                $portontemp = OdcPort::where([
                    'odc_id' => $odc_id,
                    'panel' => $x - 1, 
                    'port' => $y
                ])->first();

                $portofpanel[$y]['status'] = $portontemp != null ? 'active' : null;
                $portofpanel[$y]['data'] = $portontemp;
                
                // if($portontemp):

                //     $portofpanel[$y]['type'] = 'in';
                //     $portofpanel[$y]['data'] = $portontemp;

                // else:

                //     $portontemp = odp::where(['panel_out' => $x, 'port_out' => ($y + 1)])->first();

                //     if($portontemp):
                //         $portofpanel[$y]['type'] = 'out';
                //         $portofpanel[$y]['data'] = $portontemp;
                //     endif;

                // endif;
                
            endfor;

            $panelofodc[] = [
                'index' => 'panel ke '. $x,
                'detail' => $panelontemp ? 'Distribusi ke '. $panelontemp->distributions .' (Kap: '. $panelontemp->capacity .')': '',
                'ports' => $portofpanel
            ];

        endfor;

        $data = [
            'panelofodc' => $panelofodc,
            'distDoesntHavePanel' => $distribution,
            'alldistributions' => $alldistributions
        ];

        return response()->json(['data' => $data], 200);
    }
    
    public function add(Request $request)
    {
        $distribution = new distribution;
        $distribution->unique = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'), 0, 10);
        $distribution->name = $request->distribution_baru;
        $distribution->shortname = $request->distribution_baru;
        $distribution->distributions = intval(preg_replace('/[^0-9]+/', '', $request->distribution_baru), 10);
        $distribution->odc_id = $request->odc_id;
        $distribution->capacity = $request->capacityofdistribution;
        $distribution->save();
    }

    public function changeonedistribution(Request $request)
    {
        $panel = $request->panel;
        $distributionwillbe = $request->distribution_id;
        $odc = $request->odc_id;

        $distribution;
        
        if($distributionwillbe == 0):
            $distribution = distribution::where('odc_id', $odc)->where('panel1', $panel)->orWhere('panel2', $panel)->first();

            $distribution->panel1 = 0;
            $distribution->panel2 = 0;
        else:
            $distribution = distribution::find($distributionwillbe);
            
            if($distribution->capacity == 12):
                $distribution->panel1 = $panel;
                $distribution->panel2 = 0;
            else:
                $distribution->panel1 = $panel;
                $distribution->panel2 = ($panel + 1);
            endif;
        endif;

        $distribution->save();
        
        return response()->json(['data' => $distribution]);
    }

    public function changecapacitydistribution(Request $request)
    {
        $distribution_id = $request->distribution_id;
        $capacity = $request->capacity;

        $distribution = distribution::find($distribution_id);
        $distribution->capacity = $capacity;
        $distribution->panel1 = 0;
        $distribution->panel2 = 0;
        $distribution->save();

        return response()->json(['data' => $distribution]);
    }

    public function distribution()
    {
        $response = null;

        $distributions = distribution::get();

        if ($distributions !== null) {
            
            $response = [ 
                'data' => $distributions,
                'status' => true
            ];
        }

        return response($response);
    }

    public function saveodc(Request $request)
    {
        $response = null;
        $request = $request->json();

        $port = new OdcPort;

        $port->odc_id               = $request->get('odc');
        $port->distribution_id      = $request->get('distribution');
        $port->gpon_id              = $request->get('gpon');
        $port->splitter_id          = $request->get('splitter');
        $port->odp_id               = $request->get('odp');
        $port->splitter_port        = $request->get('splitter_port');
        $port->distribution_core    = $request->get('distribution_core');
        $port->gpon_slot            = $request->get('gpon_slot');
        $port->gpon_port            = $request->get('gpon_port');
        $port->panel                = $request->get('panelIndex');
        $port->port                 = $request->get('portIndex');
        $port->type                 = $request->get('type');

        if ($port->save()) {
            
            $response = [
                'status' => true
            ];
        }
        
        return response($response);
    }

    public function delete($id)
    {
        $response = null;

        $port = OdcPort::find($id);

        if ($port->delete()) {
            
            $response = [
                'status' => true
            ];
        }

        return response($response);
    }
}
