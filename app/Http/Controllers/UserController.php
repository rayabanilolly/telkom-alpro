<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Retrieving data from database
     */
    public function index()
    {
        $response = null;

        $data = User::orderBy('name', 'ASC')
                    ->with('mitra')
                    ->get();

        if (!$data) {
            
            $response = [
                'status' => false
            ];
        }
        else {

            $response = [
                'status'    => true,
                'data'      => $data
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
        $mitra = User::find($id);

        if ($mitra->delete()) {

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
        $response   = null;
        $request    = $request->json();

        $id     = $request->get('id');
        $pass   = $request->get('password');

        $hash   = Hash::make($pass);  

        // for update
        if ($id !== null) {

            $user = User::find($id);

            $user->name     = $request->get('name');
            $user->nik      = $request->get('nik');
            $user->email    = $request->get('email');
            $user->level    = $request->get('level');
            $user->password = $hash;

            if ($user->update()) {
                
                $response = [
                    'data' => $user,
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

            $user = new User;

            $user->unique   = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'), 0, 10);
            $user->name     = $request->get('name');
            $user->nik      = $request->get('nik');
            $user->email    = $request->get('email');
            $user->level    = $request->get('level');
            $user->password = $hash;

            if ($user->save()) {

                $response = [
                    'data' => $user,
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
