<?php

namespace App\Http\Controllers;

use App\odpspec;
use Illuminate\Http\Request;

class OdpSpekController extends Controller
{
	/**
	 * Retrieving data from database
	 */
	public function index()
	{
		$response = null;

		$data = odpspec::orderBy('name', 'ASC')
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
		$odpspec = odpspec::find($id);

		$odpspec->deleted = '1';

		if ($odpspec->update()) {

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

    		$odpspec = odpspec::find($id);

    		$odpspec->name = $request->get('name');

    		if ($odpspec->update()) {
    			
    			$response = [
    				'data' => $odpspec,
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
    		$odpspec = new odpspec;

    		$odpspec->unique = $unique;
    		$odpspec->name 	= $request->get('name');

    		if ($odpspec->save()) {

    			$response = [
    				'data' => $odpspec,
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
