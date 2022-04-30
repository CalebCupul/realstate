<?php

namespace Database\Seeders;

use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\UserSedeer;
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
        // \App\Models\User::factory(10)->create();

        // Run a specific seeder...
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSedeer::class,
            // CommentSeeder::class,
        ]);

    }
}
