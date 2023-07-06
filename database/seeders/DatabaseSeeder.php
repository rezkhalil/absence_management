<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\FiliereSeeder;
use Database\Seeders\SemestreSeeder;
use Database\Seeders\DepartementSeeder;

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
        
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(FiliereSeeder::class);
        $this->call(SemestreSeeder::class);

    }
}
