<?php

namespace App\Http\Controllers;

use App\Models\Compagny;
use Illuminate\Http\Request;
use App\Manager\CompagnyManager;
use Illuminate\Support\Facades\Auth;


class CompagnyController extends Controller
{
    private $compagnyManager;

    public function __construct(CompagnyManager $compagnyManager)
    {
        $this->compagnyManager = $compagnyManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compagnies=Compagny::paginate(10);
        return view('compagny.index', [
            'compagnies' => $compagnies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compagny.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->compagnyManager->build(new Compagny(), $request);

        if(Auth::user()->role==='ADMIN')
                {
            return redirect()->route('compagnies.index')->with('success', "L'entreprise a été enregistrée !");
                }
        else{
            return redirect()->route('trainees.show',Auth::user()->trainee->id)->with('success', "L'entreprise a été enregistrée !");
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compagny  $compagny
     * @return \Illuminate\Http\Response
     */
    public function show(Compagny $compagny)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compagny  $compagny
     * @return \Illuminate\Http\Response
     */
    public function edit(Compagny $compagny)
    {
        return view('compagny.edit',[
            'compagny' => $compagny,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compagny  $compagny
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compagny $compagny)
    {
        $this->compagnyManager->build($compagny, $request);
                
        return redirect()->route('compagnies.index')->with('success', "L'entreprise a été mise à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compagny  $compagny
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compagny $compagny)
    {
        $compagny->delete();
        return redirect()->route('compagnies.index')->with('success', "L'entreprise' a été supprimée !");
    }
}
