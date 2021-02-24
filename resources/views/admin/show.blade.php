@extends('template')

@section('title')
Under Construction
@endsection

@section('content')
<div class="container pt-2">
    <h5 class="my-3"><a href="{{route('admins.index')}}"><i class="fas fa-arrow-left mr-2"></i>Retour</a><h5>
    <div class="row">
        <div class="col-12 col-sm-4">
            <img src="{{asset('img/avatars/'.$trainee->avatar.'')}}" alt="profil" class="img-fluid" style="border-radius:100%">
        </div>
        <div class="col-12 col-sm-8">
            <div class="d-flex">
                <h1>{{ $trainee->firstname . ' ' . $trainee->name }} </h1>
                <h5 class="mx-2 my-auto"><a href="{{route('trainees.edit', $trainee->id)}}"></i>Editer</a><h5>
            </div>
            
            <div class="d-flex justify-content-start my-2">
                <span class="badge badge-pill badge-warning">
                    {{$trainee->promo->year. ' / '.$trainee->promo->city}}
                </span>
            </div>
            @if ($trainee->mobility)
            <h4>{{'Mobilité : '.$trainee->mobilityzone}}</h4>
            @else
            <h4> Pas de mobilité </h4>
            @endif
            <h5><i class="fas fa-address-card mr-2"></i>
                {{ $trainee->adress }}</h5>
            <h5><i class="fas fa-map-marked-alt mr-2"></i>
                {{ $trainee->postalcode . ' ' . $trainee->city}}</h5>
            <h5><i class="fas fa-mobile-alt mr-2"></i>
                {{ $trainee->phonenumber }}</h5>
            <h5><i class="far fa-envelope mr-2"></i>
                {{ $trainee->email }}</h5>
            <a href="{!! $trainee->portfolio !!}" target="blanck" class="btn btn-primary p-2"> <i
                    class="fas fa-laptop-code mr-2"></i>Portfolio</a>
            <a href="{!! $trainee->github !!}" target="blanck" class="btn btn-primary p-2"> <i
                    class="fab fa-github mr-2"></i>GitHub</a>
            <a href="{!! $trainee->cv !!}" target="blanck" class="btn btn-primary p-2"> <i
                    class="fas fa-user-graduate mr-2"></i>CV</a>
        </div>
    </div>
    <div class="col-12 justify-content-center pt-5">
        <h3>Compétences Acquises :</h3>
        <div>
        @foreach ($trainee->skills as $skill)
        <span class="badge badge-pill badge-success m-3 py-3" style="height:50px; width:150px; font-size:1rem">  <i class="{{$skill->icon}}"></i>
            {{ $skill->name }}</span>
        @endforeach
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        @if (count($trainee->traineeships)>0)
        <table class="table table-hover">
            <thead>
              <tr class="table-active">
                <th scope="col">Nom de l'entreprise</th>
                <th scope="col">date de la démarche</th>
                <th scope="col">date de relance</th>
                <th scope="col">date d'entretien</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($trainee->traineeships as $data)
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
                  </tr>
                @endforeach
              </tbody>
          </table>
            
        @else
            <h5> Pas de démarches enregistrées</h5>
        @endif
        </div>    
</div> 

@endsection