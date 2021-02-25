<?php

namespace App\Manager;

use App\Models\Trainee;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

Class TraineeManager
{
    public function build(Trainee $trainee, Request $request, $imgchange)
    {
    if($imgchange===true)    
    {
    // script d'upload image Avatar
    if($request->image!==null)
        {  
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();     
        $request->image->move(public_path('img/avatars'), $imageName);
        }
    else{
        $imageName ='profile.png';
        }
    }
    else{
        $imageName =$trainee->avatar;
    }
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
        $trainee->user_id = $request->input('user_id');
        $trainee->avatar = $imageName;
        $trainee->save();

        $skills=$request->input('skills');
        $idtrainee=$trainee->id;
        $skill_trainee=[];
        if($skills!==null){
            foreach ($skills as $skill=>$value)
            {
            array_push($skill_trainee , [
                'skill_id' =>$value,
                'trainee_id' =>$idtrainee
                ]);
            }
           
        $trainee->skills()->attach($skill_trainee);
        }
        

    }
}