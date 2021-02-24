<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('promo.index',[
            'promos'=> Promo::all(),
        ]);
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Promo::create([
            'year'=> $request->input('year'),
            'city'=> $request->input('city')
        ]);
        return redirect()->route('promos.index');
    }

   

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        
        $promo->update([
            'active'=>$request->input('active'),
        ]);
        return redirect()->route('promos.index');
    }

}
