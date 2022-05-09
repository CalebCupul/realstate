<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuburbsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('suburbs')->delete();
        
        DB::table('suburbs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'zip_code' => 48310,
                'suburb_name' => 'Versalles',
                'city_id' => 1,
                'sale_m2' => 2079,
                'pre_sale_m2' => 2853,
                'total_population' => 1715,
                'total_male' => 869,
                'total_female' => 809,
            ),
            1 => 
            array (
                'id' => 2,
                'zip_code' => 48350,
                'suburb_name' => '5 de Diciembre',
                'city_id' => 1,
                'sale_m2' => 2748,
                'pre_sale_m2' => 4141,
                'total_population' => 4448,
                'total_male' => 2225,
                'total_female' => 2203,
            ),
            2 => 
            array (
                'id' => 3,
                'zip_code' => 48312,
                'suburb_name' => 'Fluvial',
                'city_id' => 1,
                'sale_m2' => 1429,
                'pre_sale_m2' => 1961,
                'total_population' => 1850,
                'total_male' => 905,
                'total_female' => 931,
            ),
        ));
        
        
    }
}