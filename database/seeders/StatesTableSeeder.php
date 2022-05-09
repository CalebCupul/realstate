<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('states')->delete();
        
        DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'state_name' => 'Aguascalientes',
                'state_code' => 'Ags.',
                'country_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'state_name' => 'Baja California',
                'state_code' => 'BC',
                'country_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'state_name' => 'Baja California Sur',
                'state_code' => 'BCS',
                'country_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'state_name' => 'Campeche',
                'state_code' => 'Camp.',
                'country_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'state_name' => 'Coahuila de Zaragoza',
                'state_code' => 'Coah.',
                'country_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'state_name' => 'Colima',
                'state_code' => 'Col.',
                'country_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'state_name' => 'Chiapas',
                'state_code' => 'Chis.',
                'country_id' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'state_name' => 'Chihuahua',
                'state_code' => 'Chih.',
                'country_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'state_name' => 'Ciudad de México',
                'state_code' => 'CDMX',
                'country_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'state_name' => 'Durango',
                'state_code' => 'Dgo.',
                'country_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'state_name' => 'Guanajuato',
                'state_code' => 'Gto.',
                'country_id' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'state_name' => 'Guerrero',
                'state_code' => 'Gro.',
                'country_id' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'state_name' => 'Hidalgo',
                'state_code' => 'Hgo.',
                'country_id' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'state_name' => 'Jalisco',
                'state_code' => 'Jal.',
                'country_id' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'state_name' => 'México',
                'state_code' => 'Mex.',
                'country_id' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'state_name' => 'Michoacán de Ocampo',
                'state_code' => 'Mich.',
                'country_id' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'state_name' => 'Morelos',
                'state_code' => 'Mor.',
                'country_id' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'state_name' => 'Nayarit',
                'state_code' => 'Nay.',
                'country_id' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'state_name' => 'Nuevo León',
                'state_code' => 'NL',
                'country_id' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'state_name' => 'Oaxaca',
                'state_code' => 'Oax.',
                'country_id' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'state_name' => 'Puebla',
                'state_code' => 'Pue.',
                'country_id' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'state_name' => 'Querétaro',
                'state_code' => 'Qro.',
                'country_id' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'state_name' => 'Quintana Roo',
                'state_code' => 'Q. Roo',
                'country_id' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'state_name' => 'San Luis Potosí',
                'state_code' => 'SLP',
                'country_id' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'state_name' => 'Sinaloa',
                'state_code' => 'Sin.',
                'country_id' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'state_name' => 'Sonora',
                'state_code' => 'Son.',
                'country_id' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'state_name' => 'Tabasco',
                'state_code' => 'Tab.',
                'country_id' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'state_name' => 'Tamaulipas',
                'state_code' => 'Tamps.',
                'country_id' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'state_name' => 'Tlaxcala',
                'state_code' => 'Tlax.',
                'country_id' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'state_name' => 'Veracruz de Ignacio de la Llave',
                'state_code' => 'Ver.',
                'country_id' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'state_name' => 'Yucatán',
                'state_code' => 'Yuc.',
                'country_id' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'state_name' => 'Zacatecas',
                'state_code' => 'Zac.',
                'country_id' => 1,
            ),
        ));
        
        
    }
}