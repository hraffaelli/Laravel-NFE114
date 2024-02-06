<?php

namespace Database\Seeders;

use App\Models\Inscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $inscription= new Inscription();
        $inscription->id_session_fk = 1;
        $inscription->id_rameur_fk = 2;
        $inscription->valide = true ;
        $inscription->save();


        $inscription->id_session_fk = 1;
        $inscription->id_rameur_fk = 3;
        $inscription->valide = true ;
        $inscription->save();

        $inscription->id_session_fk = 1;
        $inscription->id_rameur_fk = 3;
        $inscription->valide = true ;
        $inscription->save();
    }
}
