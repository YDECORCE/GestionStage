<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Trainee;
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
}
