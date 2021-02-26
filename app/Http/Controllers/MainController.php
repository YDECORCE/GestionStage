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
        $traineeswithship=[];
        foreach ($trainees as $trainee){
            foreach ($trainee->traineeships as $stage){
                if ($stage->status==="Positive"){
                    array_push($traineeswithship, $trainee->id);
                }
            }
        }
        $trainees=Trainee::join('promos', 'trainees.promo_id', '=', 'promos.id')
                    ->where('promos.active', true)
                    ->whereNotIn('trainees.id', $traineeswithship)
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
