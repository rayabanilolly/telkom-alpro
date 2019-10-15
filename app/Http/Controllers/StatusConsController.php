<?php

namespace App\Http\Controllers;

use App\statuscons;
use Illuminate\Http\Request;

class StatusConsController extends Controller
{
	/**
	 * Retrieving data from database
	 */
	public function index()
	{
		$response = null;

		$data = statuscons::orderBy('name', 'ASC')
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
		$statuscons = statuscons::find($id);

		$statuscons->deleted = '1';

		if ($statuscons->update()) {

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

    		$statuscons = statuscons::find($id);

    		$statuscons->name = $request->get('name');

    		if ($statuscons->update()) {
    			
    			$response = [
    				'data' => $statuscons,
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
    		$statuscons = new statuscons;

    		$statuscons->unique = $unique;
    		$statuscons->name 	= $request->get('name');

    		if ($statuscons->save()) {

    			$response = [
    				'data' => $statuscons,
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
