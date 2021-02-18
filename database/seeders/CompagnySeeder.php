<?php

namespace Database\Seeders;

use App\Models\Compagny;
use Illuminate\Database\Seeder;

class CompagnySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Compagny::factory(25)->create();
    }
}
