<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;

class TraineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::get()->each(function($promo){
            \App\Models\Trainee::factory(6)->create([
                'promo_id' => $promo->id
            ]);
        });
    }
}
