@extends('template')

@section('title')
Admin|Stagiaires
@endsection

@section('content')
<div class="container">
 
    <h1 class="text-center my-5"> Stagiaires </h1>
   
    <table class="table table-hover">
        <thead>
          <tr class="table-active">
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Promo</th>
            <th scope="col">Liens</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($trainees as $trainee)
            <tr class="table-secondary">
                <th scope="row">{{$trainee->id}}</th>
                <td>{{ $trainee->name }}</td>
                <td>{{ $trainee->firstname }}</td>
                <td><span class="badge badge-pill badge-warning">
                    {{ $trainee->promo->year. ' / '.$trainee->promo->city }}
                </span></td>
                <td>
                    <a href="{!! $trainee->portfolio !!}" target="blanck" class="btn btn-primary p-2"> <i
                        class="fas fa-laptop-code  "></i></a>
                    <a href="{!! $trainee->github !!}" target="blanck" class="btn btn-primary p-2"> <i
                            class="fab fa-github "></i></a>    
                    <a href="{!! $trainee->cv !!}" target="blanck" class="btn btn-primary p-2"> <i
                                class="fas fa-user-graduate "></i></a>
                </td>
                <td class="d-flex">
                    
                    <a href="{{ route('trainees.edit', $trainee->id) }}" class="btn btn-warning mx-3">Editer</a>
                    <button type="button" class="btn btn-danger mx-3" onclick="document.getElementById('modal-open-{{$trainee->id}}').style.display='block'">Supprimer</button>
                    <form action="{{ route('trainees.destroy', $trainee->id) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <div class="modal" id="modal-open-{{$trainee->id}}">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">La suppresion d'un stagiaire est définitive</h5>
                              <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('modal-open-{{$trainee->id}}').style.display='none'" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Etes-vous sûr de vouloir supprimer ce stagiaire ?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-danger">oui</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('modal-open-{{$trainee->id}}').style.display='none'">Annuler</button>
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
        {{ $trainees->links('vendor/pagination/custom') }}
    </div>   
</div>   
        

@endsection