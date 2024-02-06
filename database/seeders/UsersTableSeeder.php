<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user= new User();
        $user->name='THE BOSSE1';
        $user->email='the.bosse1@gmail.com';
        $user->password='en_claire';
        $user->save();

        $user= new User();
        $user->name='THE BOSSE2';
        $user->email='the.bosse2@gmail.com';
        $user->password='en_claire';
        $user->save();

        $user= new User();
        $user->name='THE BOSSE3';
        $user->email='the.bosse3@gmail.com';
        $user->password='en_claire';
        $user->save();

        $user= new User();
        $user->name='THE BOSSE4';
        $user->email='the.bosse4@gmail.com';
        $user->password='en_claire';
        $user->save();


    }
}
