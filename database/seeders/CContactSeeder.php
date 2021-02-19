<?php

namespace Database\Seeders;

use App\Models\Compagny;
use Illuminate\Database\Seeder;

class CContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Compagny::get()->each(function($compagny){
            \App\Models\CContact::factory(2)->create([
                'compagny_id' => $compagny->id
            ]);
        });
    }
}
