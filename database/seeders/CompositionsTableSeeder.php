<?php

namespace Database\Seeders;

use App\Models\Composition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $compositions= new Composition();
        $compositions->id_equipe_fk =1;
        $compositions->id_rameur_fk =1;
        $compositions->save();
    }
}
