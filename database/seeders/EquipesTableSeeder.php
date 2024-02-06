<?php

namespace Database\Seeders;

use App\Models\Equipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $equipes= new Equipe();
        $equipes->id_session_fk =1;
        $equipes->id_rameur_fk  =1;
        $equipes->save();
    }
}
