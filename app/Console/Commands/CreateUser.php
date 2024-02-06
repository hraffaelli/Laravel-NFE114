<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new \App\Models\User();
        $user->password = Hash::make($this->argument('password'));
        $user->email = $this->argument('email');
        $user->name = $this->argument('name');
        $user->save();

        // or DB::table('users')->insert(['name'=>'Ben','email'=>'benjamin.dedardel@gmail.com','password'=>Hash::make('TODO')])
    }
}
