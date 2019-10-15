<?php

namespace App\Http\Controllers;

use App\statusproj;
use Illuminate\Http\Request;

class StatusProjectController extends Controller
{
	/**
	 * Retrieving data from database
	 */
	public function index()
	{
		$response = null;

		$data = statusproj::orderBy('name', 'ASC')
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
		$statusproj = statusproj::find($id);

		$statusproj->deleted = '1';

		if ($statusproj->update()) {

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

    		$statusproj = statusproj::find($id);

    		$statusproj->name = $request->get('name');

    		if ($statusproj->update()) {
    			
    			$response = [
    				'data' => $statusproj,
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
    		$statusproj = new statusproj;

    		$statusproj->unique = $unique;
    		$statusproj->name 	= $request->get('name');

    		if ($statusproj->save()) {

    			$response = [
    				'data' => $statusproj,
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
