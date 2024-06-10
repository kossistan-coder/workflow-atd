<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Database\Seeder;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statut::insert(
            [
                ['designation' => 'En attente',],
                ['designation' => 'En cours de traitement',],
                ['designation' => 'rejetée',],
                ['designation'=>'Accepetée']
            ]
        );
    }
}
