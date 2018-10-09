<?php

use Illuminate\Database\Seeder;

class statusproj_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['BOOKING', 'PEMBANGUNAN', 'SETOR ABD', 'REDRAW ABD', 'INTEGRASI', 'CONNECTIVITY', 'CLOSE', 'KENDALA EKSISTING', 'KENDALA POWER', 'CANCEL'];

        foreach($names as $name):
        	DB::table('statusproj')->insert([
        		'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
	        	'name' => $name,
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s'),
        	]);
        endforeach;
    }
}
