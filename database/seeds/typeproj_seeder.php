<?php

use Illuminate\Database\Seeder;

class typeproj_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['OSP FTTH', 'UNSC', 'LME HEM', 'GRANULAR', 'MIGRASI', 'VALIDASI', 'TEKNIS', 'FO EKSISTING', 'DISCOVERY', 'ALU'];

        foreach($types as $type):
        	DB::table('typeproj')->insert([
        		'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
	        	'name' => $type,
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s'),
        	]);
        endforeach;
    }
}
