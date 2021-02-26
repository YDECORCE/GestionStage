@extends('template')

@section('title')
Admin|Entreprises
@endsection

@section('content')
<div class="container-fluid">
 
    <h1 class="text-center mt-2"> {{'Contacts : '.$compagny_name}} </h1>
    <div class="d-flex justify-content-center">
      <a class="btn btn-info my-3" href="{{route('c_contacts.create', $compagny_id)}}"><i class="fas fa-user-cog mx-2"></i>Ajouter un nouveau contact</a> 
    </div>
    <table class="table table-hover">
        <thead>
          <tr class="table-active">
            <th scope="col" style="width:5%">ID</th>
            <th scope="col" style="width:15%">Nom</th>
            <th scope="col" style="width:15%">Prénom</th>
            <th scope="col" style="width:15%">Fonction</th>
            <th scope="col" style="width:15%">Téléphone</th>
            <th scope="col" style="width:20%">email</th>
            <th scope="col" style="width:15%">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr class="table-secondary">
                <th scope="row">{{$contact->id}}</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->firstname }}</td>
                <td>{{ $contact->function }}</td>
                <td>{{ $contact->phonenumber }}</td>
                <td>{{ $contact->email }}</td>
                                               
                <td class="d-flex">
                   <a href="{{route('c_contacts.edit', $contact->id)}}" class="btn btn-warning mx-3">Editer</a>
                    <button type="button" class="btn btn-danger mx-3" onclick="document.getElementById('modal-open-{{$contact->id}}').style.display='block'">Supprimer</button>
                    <form action="{{route('c_contacts.destroy', $contact->id)}}" method="POST">
                      @csrf
                      @method("DELETE")
                      <div class="modal" id="modal-open-{{$contact->id}}">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">La suppresion d'un contact est définitive</h5>
                              <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('modal-open-{{$contact->id}}').style.display='none'" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Etes-vous sûr de vouloir supprimer ce contact ?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-danger">oui</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal-open-{{$contact->id}}').style.display='none'">Annuler</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table> 
        
</div>   
        

@endsection