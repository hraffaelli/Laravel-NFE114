<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $session= new Session();
        $session->date_session = '2024-01-25';
        $session->heure_session = '2024-01-25 16:30:00';
        $session->valide = false;
        $session->save();
    }
}
