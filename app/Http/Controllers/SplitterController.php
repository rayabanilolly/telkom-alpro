<?php

namespace App\Http\Controllers;

use App\OdcPort;
use App\Splitter;
use Illuminate\Http\Request;

class SplitterController extends Controller
{
	/**
	 * Retrieving data from database
	 */
	public function index($odc_id)
	{
		$response = null;

		$data = Splitter::orderBy('name', 'ASC')
                    ->where('odc_id', $odc_id)
					->get();

		if (!$data) {

			$response = [
				'status' => false
			];
		}
		else {

			$response = [
				'status' 	=> true,
				'data' 		=> $data
			];
		}

		return response($response);
	}

	/**
	 * Deleting data from database's
	 * @params [id]
	 */
	public function delete($id)
	{
		$splitter = Splitter::find($id);

		if ($splitter->delete()) {

			$response = [
				'status' => true
			];
		}
		else {

			$response = [
				'status' => false
			];
		}

		return response($response);
	}

	/**
	 * Create and update process here
	 * Params [Request]
	 */
    public function save(Request $request)
    {
    	$response 	= null;
    	$request 	= $request->json();

    	$id = $request->get('id');

    	// for update
    	if ($id !== null) {

    		$splitter = Splitter::find($id);

    		$splitter->name = $request->get('name');
            $splitter->port = $request->get('port');

    		if ($splitter->update()) {
    			
    			$response = [
    				'data' => $splitter,
    				'status' => true
    			];
    		}
    		else {
    			$response = [
    				'status' => false
    			];
    		}
    	}
    	// for create
    	else {

    		$splitter = new Splitter;

    		$splitter->name   = $request->get('name');
            $splitter->odc_id = $request->get('odc_id');
            $splitter->port   = $request->get('port');

    		if ($splitter->save()) {

    			$response = [
    				'data' => $splitter,
    				'status' => true
    			];
    		}
    		else {

    			$response = [
    				'status' => false
    			];
    		}
    	}

    	return response($response);
    }
}
