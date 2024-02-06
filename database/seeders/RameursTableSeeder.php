<?php

namespace Database\Seeders;

use App\Models\Rameur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RameursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rameurs= new Rameur();
        $rameurs->id_user_fk = 1;
        $rameurs->nom = "CHAND";
        $rameurs->pre = "ERIC";
        $rameurs->age = "45";
        $rameurs->email = "eric.chand@gmail.com";
        $rameurs->tel   = "68987202527";
        $rameurs->niv   = "rameur";
        $rameurs->save();

        $rameurs= new Rameur();
        $rameurs->id_user_fk = 3;
        $rameurs->nom = "CHAND";
        $rameurs->pre = "MAHANA";
        $rameurs->age = "20";
        $rameurs->email = "mahane.chand@gmail.com";
        $rameurs->tel   = "68987202000";
        $rameurs->niv   = "rameur";
        $rameurs->save();

        $rameurs= new Rameur();
        $rameurs->id_user_fk = 2;
        $rameurs->nom = "BAROTTO";
        $rameurs->pre = "ONEURA";
        $rameurs->age = "13";
        $rameurs->email = "oneura.B@gmail.com";
        $rameurs->tel   = "68987202222";
        $rameurs->niv   = "peperu";
        $rameurs->save();


    }
}
