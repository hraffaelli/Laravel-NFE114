<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seance;
use App\Models\User;
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

        $User = User::create([
            'name' => 'Tamatoa',
            'email' => 'tamatoa@example.com',
            'password' => '123456',
            'statut' => '1',

        ]);

        $Seance = Seance::create([
            'date' => '2024-01-27',
            'lieu' => 'Papeete',
            'horaire' => '17:30:00',
            'fk_vaa' => '1',
            'max_users' => '6',
        ]);

        $StatutRameur = UsersStatuts::create([
            'libelle' => 'Rameur',
        ]);

        $StatutCoach = UsersStatuts::create([
            'libelle' => 'Coach',
        ]);
    }
}
