@extends('template')

@section('title')
{{ $trainee->firstname . ' ' . $trainee->name }}
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 col-sm-4">
            <img src="{{asset('img/avatars/'.$trainee->avatar.'')}}" alt="profil" class="img-fluid" style="border-radius:100%">
        </div>
        <div class="col-12 col-sm-8">
            <h1>{{ $trainee->firstname . ' ' . $trainee->name }} </h1>
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
</div>

@endsection
