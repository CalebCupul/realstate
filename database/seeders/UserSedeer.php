<?php

namespace Database\Seeders;

use App\Enums\EnumRoles;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Super Admin
        $user = User::firstOrCreate(
            [
                'name' => EnumRoles::SUDO,
            ],
            [
                'email'         => 'sudo@sudo.com',
                'password'      => 'password',
                'phone_number'  => '3221233212',
                'address'       => '497 Georgia 247',
                'total_sales'         => '0',
            ]
        );

        $user->assignRole(EnumRoles::SUDO);

        // Admin
        $user = User::firstOrCreate(
            [
                'name' => EnumRoles::ADMIN,
            ],
            [
                'email'    => 'admin@admin.com',
                'password' => 'password',
                'phone_number'  => '3228549963',
                'address'       => '18031 Central Park Cir',
                'total_sales'         => '0',
            ]
        );

        $user->assignRole(EnumRoles::ADMIN);

        // User
        $user = User::firstOrCreate(
            [
                'name' => EnumRoles::USER,
            ],
            [
                'email'    => 'user@user.com',
                'password' => 'password',
                'phone_number'  => '3225986678',
                'address'       => '900 W Riverdale Rd',
                'total_sales'         => '0',
            ]
        );

        $user->assignRole(EnumRoles::USER);

        User::factory()->count(20)->create();


    }
}
