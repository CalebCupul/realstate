<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('countries')->delete();
        
        DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_name' => 'México',
            ),
            1 => 
            array (
                'id' => 2,
                'country_name' => 'France',
            ),
        ));
        
        
    }
}