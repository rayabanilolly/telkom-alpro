<?php

namespace App\Http\Controllers;

use App\mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
	/**
	 * Retrieving data from database
	 */
	public function index()
	{
		$response = null;

		$data = mitra::orderBy('name', 'ASC')
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
		$mitra = mitra::find($id);

		$mitra->deleted = '1';

		if ($mitra->update()) {

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

    		$mitra = mitra::find($id);

    		$mitra->name = $request->get('name');

    		if ($mitra->update()) {
    			
    			$response = [
    				'data' => $mitra,
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
    		$mitra = new mitra;

    		$mitra->unique = $unique;
    		$mitra->name 	= $request->get('name');

    		if ($mitra->save()) {

    			$response = [
    				'data' => $mitra,
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
