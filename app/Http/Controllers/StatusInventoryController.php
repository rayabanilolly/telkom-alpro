<?php

namespace App\Http\Controllers;

use App\statusinv;
use Illuminate\Http\Request;

class StatusInventoryController extends Controller
{
	/**
	 * Retrieving data from database
	 */
	public function index()
	{
		$response = null;

		$data = statusinv::orderBy('name', 'ASC')
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
		$statusinv = statusinv::find($id);

		$statusinv->deleted = '1';

		if ($statusinv->update()) {

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

    		$statusinv = statusinv::find($id);

    		$statusinv->name = $request->get('name');

    		if ($statusinv->update()) {
    			
    			$response = [
    				'data' => $statusinv,
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
    		$statusinv = new statusinv;

    		$statusinv->unique = $unique;
    		$statusinv->name 	= $request->get('name');

    		if ($statusinv->save()) {

    			$response = [
    				'data' => $statusinv,
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
