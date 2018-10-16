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
                sto_seeder::class,
                typeproj_seeder::class,
                statusproj_seeder::class,
                statusinv_seeder::class,
                statuscons_seeder::class,
                odpspec_seeder::class,
                odcspec_seeder::class,
                mitra_seeder::class,
                gponmerk_seeder::class,
        		user_seeder::class
        	]
        );
    }
}
