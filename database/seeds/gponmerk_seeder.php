<?php

use Illuminate\Database\Seeder;

class gponmerk_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['ZTE', 'ALU', 'FIBERHOME', 'HUAWEI'];

        foreach($names as $name):
        	DB::table('gponmerk')->insert([
        		'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
	        	'name' => $name,
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s'),
        	]);
        endforeach;
    }
}
