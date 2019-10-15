<?php

namespace App\Http\Controllers;

use App\sto;
use App\witel;
use Illuminate\Http\Request;

class StoController extends Controller
{
	/**
	 * Retrieving all witel data's from databases
	 */
	public function index()
	{
		$response = null;

		$data = sto::orderBy('name', 'ASC')
					->with('witel')
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
	 * Params [id]
	 */
	public function delete($id)
	{
		$region = sto::find($id);

		if (!$region) {

			$response = [
				'status' => false
			];
		}
		else {
			
			$region->delete();

			$response = [
				'status' => true
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

    		$region = sto::find($id);

    		$region->witel_id 	= $request->get('witelId');
    		$region->shortname 	= $request->get('shortName');
    		$region->name 		= $request->get('name');

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
    		$region = new sto;

    		$region->unique 	= $unique;
    		$region->witel_id 	= $request->get('witelId');
    		$region->shortname 	= $request->get('shortName');
    		$region->name 		= $request->get('name');

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
