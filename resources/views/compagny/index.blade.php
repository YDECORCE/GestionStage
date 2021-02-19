@extends('template')

@section('title')
Admin|Entreprises
@endsection

@section('content')
<div class="container">
 
    <h1 class="text-center mt-2"> Entreprises </h1>
    <div class="d-flex justify-content-center">
      <a class="btn btn-info my-3" href="{{ route('compagnies.create') }}"><i class="fas fa-user-cog mx-2"></i>Ajouter une nouvelle entreprise</a> 
    </div>
    <table class="table table-hover">
        <thead>
          <tr class="table-active">
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Adresse</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Site Web</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($compagnies as $compagny)
            <tr class="table-light">
                <th scope="row">{{$compagny->id}}</th>
                <td>{{ $compagny->name }}</td>
                <td>{{ $compagny->adress.' '.$compagny->postalcode.' '.$compagny->city}}</td>
                <td>{{ $compagny->phonenumber }}</td>
                <td>{{ $compagny->website }}</td>
                                
                <td class="d-flex">
                    
                    <a href="{{ route('compagnies.edit', $compagny->id) }}" class="btn btn-warning mx-3">Editer</a>
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