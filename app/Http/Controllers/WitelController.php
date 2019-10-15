<?php

namespace App\Http\Controllers;

use App\witel;
use App\regional;
use Illuminate\Http\Request;

class WitelController extends Controller
{
	/**
	 * Retrieving data from database
	 */
	public function index()
	{
		$response = null;

		$data = witel::orderBy('name', 'ASC')
					->with('regional')
					->where('deleted', '0')
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
		$witel = witel::find($id);

		$witel->deleted = '1';

		if ($witel->update()) {

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

    		$region = witel::find($id);

    		$region->regional_id 	= $request->get('regionalId');
    		$region->name 			= $request->get('name');

    		if ($region->update()) {
    			
    			$response = [
    				'data' => $region,
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

    		$unique = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'), 0, 10);
    		$region = new witel;

    		$region->unique 		= $unique;
    		$region->regional_id 	= $request->get('regionalId');
    		$region->name 			= $request->get('name');

    		if ($region->save()) {

    			$response = [
    				'data' => $region,
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
