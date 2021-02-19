<?php

namespace App\Http\Controllers;

use App\Models\CContact;
use App\Models\Compagny;
use Illuminate\Http\Request;
use App\Manager\ContactManager;
use Illuminate\Support\Facades\DB;

class CContactController extends Controller
{
    private $contactManager;

    public function __construct(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Compagny $compagny)
    {
        $contacts=CContact::where('compagny_id',$compagny->id)->get();
        // $contacts=DB::table('c_contacts')->where('compagny_id',$compagny->id)->get();
        return view('contact.index',[
            'contacts' => $contacts,
            'compagny_name' => $compagny->name,
            'compagny_id' => $compagny->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Compagny $compagny)
    {
        $campagny_id=$compagny->id;
        return view('contact.create', [
            'compagny_id' => $campagny_id,
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
        $this->contactManager->build($cContact=new CContact(), $request);
                
        return redirect()->route('c_contacts.index',$cContact->compagny_id)->with('success', "Le contact a été enregistrée !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CContact  $cContact
     * @return \Illuminate\Http\Response
     */
    public function show(CContact $cContact)
    {
        return view('contact.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CContact  $cContact
     * @return \Illuminate\Http\Response
     */
    public function edit(CContact $cContact)
    {
        return view('contact.edit',[
            'contact' => $cContact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CContact  $cContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CContact $cContact)
    {
        $this->contactManager->build($cContact, $request);
                
        return redirect()->route('c_contacts.index',$cContact->compagny_id)->with('success', "Le contact a été mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CContact  $cContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(CContact $cContact)
    {
        //
    }
}
