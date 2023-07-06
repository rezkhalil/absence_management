<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semestre::create([
            'id' => 1,
            'nom_sem' => 'S1',
     ]);
     Semestre::create([
        'id' => 2,
        'nom_sem' => 'S2',
 ]);

 Semestre::create([
    'id' => 3,
    'nom_sem' => 'S3',
]);
Semestre::create([
    'id' => 4,
    'nom_sem' => 'S4',
]);

Semestre::create([
    'id' => 5,
    'nom_sem' => 'S5',
]);
Semestre::create([
    'id' => 6,
    'nom_sem' => 'S6',
]);
    }
}
