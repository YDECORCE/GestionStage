<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $annee=['2019','2020'];
        $ville=['Lons le Saunier', 'Besancon'];
        for($i=0;$i<2;$i++){
            for($j=0;$j<2;$j++){
                Promo::create([
                    'year' => $annee[$i],
                    'city' => $ville[$j],
                ]);
            }
        }
    }
}
