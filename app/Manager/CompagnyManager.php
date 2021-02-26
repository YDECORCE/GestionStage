<?php

namespace App\Manager;

use App\Models\Compagny;
use Illuminate\Http\Request;

Class CompagnyManager
{
    public function build(Compagny $company, Request $request)
    {
        $datavalidate=$request->validate([
            'name' => 'required',
            'adress' => 'required',
            'postalcode' => 'required',
            'city' => 'required',
            'phonenumber' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            ]);   


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