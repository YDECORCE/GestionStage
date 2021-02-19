<?php

namespace App\Manager;

use App\Models\CContact;
use Illuminate\Http\Request;

class ContactManager
{
    public function build(CContact $c_contact, Request $request)
    {
        $c_contact->name =$request->input('name');
        $c_contact->firstname =$request->input('firstname');
        $c_contact->function =$request->input('function');
        $c_contact->phonenumber =$request->input('phonenumber');
        $c_contact->email =$request->input('email');
        $c_contact->compagny_id =$request->input('compagny_id');
        $c_contact->save();
    }
}