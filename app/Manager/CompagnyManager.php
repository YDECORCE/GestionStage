<?php

namespace App\Manager;

use App\Models\Compagny;
use Illuminate\Http\Request;

Class CompagnyManager
{
    public function build(Compagny $company, Request $request)
    {
        $company->name =$request->input('name');
        $company->adress =$request->input('adress');
        $company->postalcode =$request->input('postalcode');
        $company->city =$request->input('city');
        $company->phonenumber =$request->input('phonenumber');
        $company->email =$request->input('email');
        $company->website =$request->input('website');
        $company->save();
    }
}