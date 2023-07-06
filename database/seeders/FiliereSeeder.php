<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Seeder;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filiere::create([
            'id' => 1,
            'nom_filiere' => 'Génie Logiciel Et Système D`Information : GL',
            'id_dep' => 1,

     ]);
     Filiere::create([
        'id' => 2,
        'nom_filiere' => 'Informatique et Multimédia : IM',
        'id_dep' => 1,

 ]);
    Filiere::create([
        'id' => 3,
        'nom_filiere' => 'Ingénierie des réseaux et systèmes',
        'id_dep' => 2,

    ]);
    Filiere::create([
    'id' => 4,
    'nom_filiere' => ' Mastère de Recherche en Systèmes d`Informations et Web',
    'id_dep' => 3,
    ]);
    Filiere::create([
    'id' => 5,
    'nom_filiere' => 'Mastère Professionnel en Administration et Sécurité des Réseaux Informatiques',
    'id_dep' => 4,
    ]);
    Filiere::create([
    'id' => 6,
    'nom_filiere' => 'Mastère Professionnel en Application Web Intelligente',
    'id_dep' => 4,
    ]);
    Filiere::create([
    'id' => 7,
    'nom_filiere' => 'Mastère Co-Construite en Nouvelles Technologies de l`Information et de la Communication dédiées à l`Innovation de l`Agriculture',
    'id_dep' => 4,
    ]);
}

}
