<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name=['HTML','CSS','PHP','JAVASCRIPT','GITHUB','SYMFONY','LARAVEL','WORDPRESS','VUEJS','REACTJS','ANGULAR','NODEJS'];
        $icon=['html5','css3-alt','php','js','github','symfony','laravel','wordpress','vuejs','react', 'angular','node-js'];
        for($i=0;$i<count($name);$i++){
                Skill::create([
                    'name' => $name[$i],
                    'icon' => 'fab fa-'.$icon[$i],
                ]);
        }
    }
}
