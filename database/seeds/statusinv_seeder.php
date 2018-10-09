<?php

use Illuminate\Database\Seeder;

class statusinv_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['OGP', 'GOLIVE', 'KURANG POWER', 'DUPLIKASI POWER', 'DELETED', 'CANCEL', 'SURVEY', 'SELESAI SURVEY'];

        foreach($names as $name):
        	DB::table('statusinv')->insert([
        		'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
	        	'name' => $name,
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s'),
        	]);
        endforeach;
    }
}
