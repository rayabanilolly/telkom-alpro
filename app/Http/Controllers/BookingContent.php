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
use App\odp;
use App\project;

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

    public function odpcountofdistribution($distribution_id)
    {
        $odpcount = odp::where('distribution_id', $distribution_id)->count();
        $distribution = distribution::find($distribution_id)->first();
        $leftovercores = ($distribution->capacity - $odpcount);

        $data = array(
                'capacity' => $distribution->capacity,
                'leftovercores' => $leftovercores
            );

        return response()->json(['data' => $data], 200);
    }

    public function odpcountofodc($odc_id)
    {
        $latestlabel = odp::where('odc_id', $odc_id)->max('label');

        $data = array(
            'latestlabel' => $latestlabel
        );

        return response()->json(['data' => $data, 200]);
    }

    public function booking(Request $request)
    {
        $data['regional'] = $request->regional;
        $data['witel'] = $request->witel;
        $data['sto'] = $request->sto;
        $data['nama_projek'] = $request->nama_projek;
        $data['mitra'] = $request->mitra;
        $data['tipe_projek'] = $request->tipe_projek;
        $data['nomor_kontrak'] = $request->nomor_kontrak;
        $data['odc'] = $request->odc;
        $data['odc_baru'] = $request->odc_baru;
        $data['spek_odc_baru'] = $request->spek_odc_baru;
        $data['distribusi'] = $request->distribusi;
        $data['distribusi_baru'] = $request->distribusi_baru;
        $data['kap_distribusi_baru'] = $request->kap_distribusi_baru;
        $data['jumlah_odp'] = $request->jumlah_odp;
        $data['jumlah_odp_awal'] = $request->jumlah_odp_awal;
        $data['label_odp'] = json_decode($request->label_odp);

        $project = array(); $odc = array(); $distribusi = array(); $odp = array();

        // Projek //
        $project = new project;
        $project->unique = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'), 0, 10);
        $project->name = $data['nama_projek'];
        $project->regional_id = $data['regional'];
        $project->witel_id = $data['witel'];
        $project->sto_id = $data['sto'];
        $project->typeproj_id = $data['tipe_projek'];
        $project->no_contract = $data['nomor_kontrak'];
        $project->mitra_id = $data['mitra'];
        $project->odpcount = $data['jumlah_odp'] == 'tanpaodp' ? 0 : $data['jumlah_odp'];
        $project->save();
        // Projek //

        // ODC //
        if($data['odc'] == 'add'):
            $odc = new odc;
            $odc->unique = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'), 0, 10);
            $odc->name = $data['odc_baru'];
            $odc->odcspec_id = $data['spek_odc_baru'];
            $odc->regional_id = $data['regional'];
            $odc->witel_id = $data['witel'];
            $odc->sto_id = $data['sto'];
            $odc->mitra_id = $data['mitra'];
            $odc->project_id = $project->id;
            $odc->save();
        endif;
        // ODC //

        // Distribusi //
        if($data['distribusi'] == 'add'):
            $distribusi = new distribution;
            $distribusi->unique = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'), 0, 10);
            $distribusi->name = $data['distribusi_baru'];
            $distribusi->shortname = $data['distribusi_baru'];
            // $distribusi->distributions = intval($data['distribusi_baru']);
            $distribusi->distributions = intval(preg_replace('/[^0-9]+/', '', $data['distribusi_baru']), 10);
            $distribusi->odc_id = $data['odc'] == 'add' ? $odc->id : $data['odc'];
            $distribusi->capacity = $data['kap_distribusi_baru'];
            $distribusi->save();
        endif;
        // Distribusi //

        // ODP //
        if($data['jumlah_odp'] != 'tanpaodp'):
            for($x = 0; $x < $data['jumlah_odp']; $x++):
                $odp = new odp;
                $odp->unique = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'), 0, 10);
                $odp->label = $data['label_odp'][$x]->number;
                $odp->name = $data['label_odp'][$x]->label;
                $odp->frame = $data['label_odp'][$x]->frame;
                $odp->odc_id = $data['odc'] == 'add' ? $odc->id : $data['odc'];
                $odp->distribution_id = $data['distribusi'] == 'add' ? $distribusi->id : $data['distribusi'];
                $odp->regional_id = $data['regional'];
                $odp->witel_id = $data['witel'];
                $odp->sto_id = $data['sto'];
                $odp->mitra_id = $data['mitra'];
                $odp->project_id = $project->id;
                $odp->save();
            endfor;
        endif;
        // ODP //

        return response()->json(['data' => $data], 200);
    }
}
