<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Trainee;
use App\Models\Compagny;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){

        $trainees=Trainee::join('promos', 'trainees.promo_id', '=', 'promos.id')
                    ->where('promos.active', true)
                    ->select('trainees.*')
                    ->orderBy('name', 'asc')
                    ->paginate(6);
        return view('home', [
            'trainees' => $trainees,
            'promos' => Promo::all(),
        ]);
    }

    public function show(Trainee $trainee){
        return view('trainee', [
            'trainee' => $trainee,
        ]);
    }
    public function compagny(){
        return view('compagnies', [
            'compagnies' => Compagny::paginate(6),
        ]);
    }
    public function showcompagny(Compagny $compagny){
        return view('compagny', [
            'compagny' => $compagny,
        ]);
    }
}
