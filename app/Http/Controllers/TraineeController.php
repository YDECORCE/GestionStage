<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Skill;
use App\Models\Trainee;
use App\Models\Compagny;
use App\Models\Traineeship;
use Illuminate\Http\Request;
use App\Manager\TraineeManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class TraineeController extends Controller
{
    private $traineeManager;

    public function __construct(TraineeManager $traineeManager)
    {
        $this->traineeManager = $traineeManager;
    }

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
    public function create()
    {
       return view('trainee.create', [
           'promos' => Promo::where('active', true)->get(),
           'skills' => Skill::all(),
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
       
        $imgchange=true;
        $this->traineeManager->build($trainee=new Trainee(), $request, $imgchange);
                
        return redirect()->route('trainees.show', $trainee->id)->with('success', "Votre compte a été créé!! Bonne recherche de stage");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function show(Trainee $trainee)
    {
        return view('trainee.show', [
            'trainee' =>$trainee,
            'compagnies'=>Compagny::all(),
            'traineeship' =>Traineeship::where('trainee_id',$trainee->id)
                            ->orderBy('dateofdemand', 'desc')                
                            ->paginate(10),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainee $trainee)
    {
        return view('trainee.edit', [
            'trainee'=> $trainee,
            'promos' => Promo::where('active', true)->get(),
            'skills' => Skill::all(),
                   ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainee $trainee)
    {   
        $trainee->skills()->detach();
       
        if(!$request->image)
        {
            $imgchange=false;
        }
        else{$imgchange=true;}
        $this->traineeManager->build($trainee, $request, $imgchange);

        if(Auth::user()->role==='ADMIN')
        {
            return redirect()->route('admins.show',$trainee->id)->with('success', "Le stagiaire a été mis à jour!!!");
        }
        else
        {
            return redirect()->route('trainees.show',$trainee->id)->with('success', "Vos informations ont été mise à jour!!!");
            }        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainee $trainee)
    {
        $user=User::where('id', $trainee->user_id)->first();
        $user->delete();
        return redirect()->route('admins.index')->with('success', "Le stagiaire a été supprimé !");
    }
}
