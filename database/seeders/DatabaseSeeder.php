<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seance;
use App\Models\User;
use App\Models\PosteRameur;
use App\Models\UsersStatuts;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Tamatoa',
            'email' => 'tamatoa@example.com',
            'statut' => '2',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Teva',
            'email' => 'teva@example.com',
            'statut' => '1',
            'password' => '123456',
        ]);

        Seance::create([
            'date' => '2024-01-27',
            'lieu' => 'Papeete',
            'horaire' => '17:30:00',
            'max_users' => '6',
        ]);

        UsersStatuts::create([
            'libelle' => 'Rameur',
        ]);

        UsersStatuts::create([
            'libelle' => 'Coach',
        ]);

        PosteRameur::create([
            'libelle' => 'Fa\'ahoro',
        ]);

        PosteRameur::create([
            'libelle' => 'Mono Fa\'ahoro',
        ]);

        PosteRameur::create([
            'libelle' => 'Moteurs 1',
        ]);

        PosteRameur::create([
            'libelle' => 'Moteurs 2',
        ]);

        PosteRameur::create([
            'libelle' => 'Mono Peperu',
        ]);

        PosteRameur::create([
            'libelle' => 'Peperu',
        ]);
    }
}
