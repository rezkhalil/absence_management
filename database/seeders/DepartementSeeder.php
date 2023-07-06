<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departement::create([
            'id' => 1,
            'nom_dep' => ' Licence en Computer Science',

     ]);
     Departement::create([
        'id' => 2,
        'nom_dep' => 'Licence en Computer Engineering',

    ]);
    Departement::create([
    'id' => 3,
    'nom_dep' => 'Master Professionnel',
    ]);
    Departement::create([
        'id' => 4,
        'nom_dep' => 'Master recherche',
        ]);
    }
}
