@extends('template')

@section('title')
Admin|Entreprises
@endsection

@section('content')
<div class="container-fluid">
 
    <h1 class="text-center mt-2"> Entreprises </h1>
    <div class="d-flex justify-content-center">
      <a class="btn btn-info my-3" href="{{ route('compagnies.create') }}"><i class="fas fa-user-cog mx-2"></i>Ajouter une nouvelle entreprise</a> 
    </div>
    <table class="table table-hover">
        <thead>
          <tr class="table-active">
            <th scope="col" style="width:5%">ID</th>
            <th scope="col" style="width:25%">Nom</th>
            <th scope="col" style="width:25%">Adresse</th>
            <th scope="col" style="width:15%">Téléphone</th>
            <th scope="col" style="width:20%">Site Web</th>
            <th scope="col" style="width:20%">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($compagnies as $compagny)
            <tr class="table-secondary">
                <th scope="row">{{$compagny->id}}</th>
                <td>{{ $compagny->name }}</td>
                <td>{{ $compagny->adress}}<br/> {{$compagny->postalcode.' '.$compagny->city}}</td>
                <td>{{ $compagny->phonenumber }}</td>
                <td><a href={{$compagny->website}} target="blanck" >{{$compagny->website }}</a></td>
                                
                <td class="d-flex">
                    
                    <a href="{{ route('compagnies.edit', $compagny->id) }}" class="btn btn-warning mx-3">Editer</a>
                    <a href="{{ route('c_contacts.index', $compagny->id) }}" class="btn btn-warning mx-3">Contacts</a>
                    <button type="button" class="btn btn-danger mx-3" onclick="document.getElementById('modal-open-{{$compagny->id}}').style.display='block'">Supprimer</button>
                    <form action="{{ route('compagnies.destroy', $compagny->id) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <div class="modal" id="modal-open-{{$compagny->id}}">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">La suppresion d'une entreprise est définitive</h5>
                              <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('modal-open-{{$compagny->id}}').style.display='none'" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Etes-vous sûr de vouloir supprimer cette entreprise ?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-danger">oui</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal-open-{{$compagny->id}}').style.display='none'">Annuler</button>
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
      <div class="d-flex justify-content-center mt-5">
        {{ $compagnies->links('vendor/pagination/custom') }}
    </div>   
</div>   
        

@endsection