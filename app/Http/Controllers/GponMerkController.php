<?php

namespace App\Http\Controllers;

use App\gponmerk;
use Illuminate\Http\Request;

class GponMerkController extends Controller
{
	/**
	 * Retrieving data from database
	 */
	public function index()
	{
		$response = null;

		$data = gponmerk::orderBy('name', 'ASC')
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
		$gponmerk = gponmerk::find($id);

		$gponmerk->deleted = '1';

		if ($gponmerk->update()) {

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

    		$gponmerk = gponmerk::find($id);

    		$gponmerk->name = $request->get('name');

    		if ($gponmerk->update()) {
    			
    			$response = [
    				'data' => $gponmerk,
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
    		$gponmerk = new gponmerk;

    		$gponmerk->unique = $unique;
    		$gponmerk->name 	= $request->get('name');

    		if ($gponmerk->save()) {

    			$response = [
    				'data' => $gponmerk,
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
