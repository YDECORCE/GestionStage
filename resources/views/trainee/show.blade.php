@extends('template')

@section('title')
Under Construction
@endsection

@section('content')
<div class="container justify-content-center">  
    <div class="col-12 justify-content-center">
       <h3>{{$trainee->firstname}}, faisons le point sur ta recherche de stage...</h3>
    </div>
    <div class="row mt-5">
        <h4>Saisir une nouvelle démarche de stage</h4>
        <div class="col-12">
            <form action="{{route('traineeships.store')}}" method="post">
                @csrf
                <div class="form-group">
                <input hidden name="trainee_id" value="{{$trainee->id}}">
                <select name="compagny_id" id="" class="form-control" >
                    <option value="">Choisir une entreprise</option>
                        @foreach ($compagnies as $compagny)
                            <option value="{{$compagny->id}}">{{$compagny->name.' / '.$compagny->postalcode.' '.$compagny->city}}
                        @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label>Date de la démarche</label>
                    <input type="date" name="dateofdemand" class="form-control" placeholder="date de la démarche" />
                </div>
                <button type="submit" class="btn btn-primary">Créer une nouvelle démarche</button>
            </form>
        </div>
        
    </div>
 <div class="row mt-5 justify-content-center">
@if (count($traineeship)>0)
<table class="table table-hover">
    <thead>
      <tr class="table-active">
        <th scope="col">Nom de l'entreprise</th>
        <th scope="col">date de la démarche</th>
        <th scope="col">date de relance</th>
        <th scope="col">date d'entretien</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach ($traineeship as $data)
        @switch($data->status)
            @case("Positive")
                <tr class="table-success"> 
                @break
            @case("Négative")
                <tr class="table-danger">
                @break
            @case("Relancée")
                <tr class="table-warning">  
                @break
            @default
                <tr class="table-secondary">  
        @endswitch
        
            <th scope="row">{{ $data->compagny->name}}</th>
            <td>{{date('d-M-Y', strtotime($data->dateofdemand))}}</td>
            <td>
                @if ($data->relaunchdate)
                    {{date('d-M-Y', strtotime( $data->relaunchdate))}}
                @else
                    Pas de relance effectuée
                @endif
            </td>
            <td>
                @if ($data->dateofinterview)
                    {{date('d-M-Y', strtotime($data->dateofinterview))}}
                @else
                    Pas d'entretien passé
                @endif
            </td>
            <td>{{ $data->status}}</td>
            <td class="d-flex">
                
                <a href="{{route('traineeships.edit', $data->id)}}" >Editer</a>
             
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>
  <div class="d-flex justify-content-center mt-5">
    {{ $traineeship->links('vendor/pagination/custom') }}
</div>   
@else
    <h5> Pas de démarches enregistrées</h5>
@endif
</div> 
   
</div>
        

@endsection