<?php

namespace Database\Seeders;

use App\Models\TypeInformation;
use Illuminate\Database\Seeder;

class TypeInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeInformation::insert([
            ['designation'=>'Date'],
            ['designation'=>'Heure'],
            ['designation'=>'Texte'],
        ]);
    }
}
