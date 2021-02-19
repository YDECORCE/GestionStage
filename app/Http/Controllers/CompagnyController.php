<?php

namespace App\Http\Controllers;

use App\Models\Compagny;
use Illuminate\Http\Request;
use App\Manager\CompagnyManager;


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
        $compagnies=Compagny::paginate(6);
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
                
        return redirect()->route('compagnies.index')->with('success', "L'entreprise a été enregistrée !");
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
        return view('compagny.edit');
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
        //
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
