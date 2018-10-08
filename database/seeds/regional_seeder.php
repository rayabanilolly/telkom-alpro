<?php

use Illuminate\Database\Seeder;

class regional_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$areas = ['REGIONAL 1 (SUMATERA)', 'REGIONAL 2 (JADEBOTABES)', 'REGIONAL 3 (JAWA BARAT)', 'REGIONAL 4 (JATENG & DIY)', 
    				'REGIONAL 5 (JATIM BALI NUSRA)', 'REGIONAL 6 (KALIMANTAN)', 'REGIONAL 7 (KTI)'];

    	foreach($areas as $area):
    		DB::table('regional')->insert([
	        	'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
	        	'name' => $area,
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s'),
	        ]);	
    	endforeach;
        
    }
}
