<?php

use Illuminate\Database\Seeder;

class mitra_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['PT TA', 'PT BISTEL', 'PT TEKKEN', 'PT SPM', 'PT TKM', 'PT TRIPUTRA'];

        foreach($names as $name):
        	DB::table('mitra')->insert([
        		'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
	        	'name' => $name,
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s'),
        	]);
        endforeach;
    }
}
