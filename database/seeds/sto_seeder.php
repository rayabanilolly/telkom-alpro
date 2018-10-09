<?php

use Illuminate\Database\Seeder;

class sto_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['SMRSEM', 'SMRTSN', 'SMRPAA', 'SMRLMP', 'SMRPLL', 'SMRLOB', 'SMRSGK', 'SMRSBR', 'SMRTMD', 'SMRSMR', 
        		'TRGTGG', 'TRGSAN', 'TRGAGN', 'MLKMLA', 'MBDMBD', 'SAASTT', 'BOGLKT', 'BOGBOT'];
        $shorts = ['SEM', 'TSN', 'PAA', 'LMP', 'PLL', 'LOB', 'SGK', 'SBR', 'TMD', 'SMR', 'TGG', 'SAN', 'AGN', 'MLA', 'MBD', 'STT', 'LKT', 'BOT'];


       $index = 0;
        foreach($names as $name):
        	DB::table('sto')->insert([
        		'unique' => substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
	        	'name' => $name,
	        	'shortname' => $shorts[$index],
	        	'witel_id' => 6,
	        	'created_at' => date('Y-m-d H:i:s'),
	        	'updated_at' => date('Y-m-d H:i:s'),
        	]);
        	$index++;
        endforeach;

    }
}
