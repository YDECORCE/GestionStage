<?php

namespace App\Manager;

use App\Models\Trainee;
use Illuminate\Http\Request;

Class TraineeManager
{
    public function build(Trainee $trainee, Request $request)
    {
        $trainee->firstname = $request->input('firstname');
        $trainee->name = $request->input('name');
        $trainee->adress = $request->input('adress');
        $trainee->postalcode = $request->input('postalcode');
        $trainee->city = $request->input('city');
        $trainee->phonenumber = $request->input('phonenumber');
        $trainee->email = $request->input('email');
        $trainee->portfolio = $request->input('portfolio');
        $trainee->github = $request->input('github');
        $trainee->cv = $request->input('cv');
        $trainee->mobility = $request->input('mobility');
        $trainee->mobilityzone = $request->input('mobilityzone');
        $trainee->promo_id = $request->input('promo');
        $trainee->save();

    }
}