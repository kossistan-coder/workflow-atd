<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'designation' => 'Employé',
                'niveau' => 1,
                'description'=>" n'execute aucune tache particulière à part suivre les evolutions"
            ],
            [
                'designation' => 'Administrateur système',
                'niveau' => 2,
                'description'=>"A tous les droits et privilèges"
            ],
            [
                'designation'=>'Ressources humaines',
                'niveau' => 3,
                'description'=>"Chargés de valider , d'accepter les demandes des clients"
            ],
            [
                'designation'=>'Superviseur',
                'niveau' => 4,
                'description'=>"Veille à conformité de la demande avec les politques puis ensuite les envoie aux RH"
                ],
        ]);
    }
}
