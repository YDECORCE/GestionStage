<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Trainee;
use App\Models\Compagny;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('home', [
            'trainees' => Trainee::paginate(6),
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
