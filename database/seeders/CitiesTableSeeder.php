<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('cities')->delete();
        
        DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'city_name' => 'Puerto Vallarta',
                'state_id' => 14,
            ),
        ));
        
        
    }
}