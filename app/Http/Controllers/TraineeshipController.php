<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use App\Models\Compagny;
use App\Models\Traineeship;
use Illuminate\Http\Request;

class TraineeshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Trainee $trainee, Compagny $compagny)
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datavalidate=$request->validate([
                'compagny_id' => 'required',
                'dateofdemand' => 'required'
        ]);

        $traineeship=new Traineeship;
        $traineeship->trainee_id = $request->input('trainee_id');
        $traineeship->compagny_id = $request->input('compagny_id');
        $traineeship->dateofdemand = $request->input('dateofdemand');
        $traineeship->save();
        return redirect()->route('trainees.show',$traineeship->trainee_id)->with('success', "La démarche a été enrgistrée");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traineeship  $traineeship
     * @return \Illuminate\Http\Response
     */
    public function show(Traineeship $traineeship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traineeship  $traineeship
     * @return \Illuminate\Http\Response
     */
    public function edit(Traineeship $traineeship)
    {
        return view('traineeship.edit', [
            'traineeship' => $traineeship,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traineeship  $traineeship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traineeship $traineeship)
    {
       
        $traineeship->trainee_id = $request->input('trainee_id');
        $traineeship->compagny_id = $request->input('compagny_id');
        $traineeship->dateofdemand = $request->input('dateofdemand');
        $traineeship->relaunchdate = $request->input('relaunchdate');
        $traineeship->dateofinterview = $request->input('dateofinterview');
        $traineeship->status =$request->input('status');
        $traineeship->update();
        return redirect()->route('trainees.show',$traineeship->trainee_id)->with('success', "La démarche a été enrgistrée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traineeship  $traineeship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traineeship $traineeship)
    {
        //
    }
}
