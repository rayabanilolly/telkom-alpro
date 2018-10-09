<?php

use Illuminate\Database\Seeder;

class odcspec_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['ODC-B-48', 'ODC-C-576', 'ODC-C-288', 'ODC-C-144', 'ODC-C-48'];

        foreach($names as $name):
        	DB::table('odcspec')->insert([
        		'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
	        	'name' => $name,
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s'),
        	]);
        endforeach;
    }
}
