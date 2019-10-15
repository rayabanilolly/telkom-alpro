<?php

namespace App\Http\Controllers;

use App\odcspec;
use Illuminate\Http\Request;

class OdcSpekController extends Controller
{
	/**
	 * Retrieving data from database
	 */
	public function index()
	{
		$response = null;

		$data = odcspec::orderBy('name', 'ASC')
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
		$odcspec = odcspec::find($id);

		$odcspec->deleted = '1';

		if ($odcspec->update()) {

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

    		$odcspec = odcspec::find($id);

    		$odcspec->name = $request->get('name');

    		if ($odcspec->update()) {
    			
    			$response = [
    				'data' => $odcspec,
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
    		$odcspec = new odcspec;

    		$odcspec->unique = $unique;
    		$odcspec->name 	= $request->get('name');

    		if ($odcspec->save()) {

    			$response = [
    				'data' => $odcspec,
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
