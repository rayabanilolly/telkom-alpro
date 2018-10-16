<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
        	'name' => 'Administrator',
        	'nik' => '94170274',
            'email' => 'mf16081994@gmail.com',
        	'password' => Hash::make('samarinda'),
        	'mitra_id' => 1,
        	'level' => 1,
        	'active' => 1,
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
