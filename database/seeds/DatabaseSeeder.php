<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
        	[
        		regional_seeder::class,
        		witel_seeder::class,
        		sto_seeder::class
        	]
        );
    }
}
