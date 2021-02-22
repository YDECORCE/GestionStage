<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'email' =>'a.merucci@codeur.online',
            'name' => 'Alain Merucci',
            'password' => Hash::make('password'),
            'role'=>'ADMIN',
       ]);
    }
}
