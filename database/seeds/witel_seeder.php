<?php

use Illuminate\Database\Seeder;

class witel_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $witels = ['BALIKPAPAN', 'KALBAR', 'KALSEL', 'KALTARA', 'KALTENG', 'SAMARINDA'];

        foreach($witels as $witel):
        	DB::table('witel')->insert([
        		'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
	        	'name' => $witel,
	        	'regional_id' => 13,
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s'),
        	]);
	    endforeach;
    }
}
