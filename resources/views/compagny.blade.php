@extends('template')

@section('title')
Détail Entreprise
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 col-sm-4">
            <img src="{{asset('img/FauxLogo.jpg')}}" alt="profil" class="img-fluid">
        </div>
        <div class="col-12 col-sm-8">
            <h1>{{ $compagny->name }} </h1>
            <h5><i class="fas fa-address-card mr-2"></i>
                {{ $compagny->adress }}</h5>
            <h5><i class="fas fa-map-marked-alt mr-2"></i>
                {{ $compagny->postalcode . ' ' . $compagny->city}}</h5>
            <h5><i class="fas fa-mobile-alt mr-2"></i>
                {{ $compagny->phonenumber }}</h5>
            <h5><i class="far fa-envelope mr-2"></i>
                {{ $compagny->email }}</h5>
            <h5><i class="fas fa-desktop mr-2"></i>
                {{ $compagny->website }}</h5>
        </div>
    </div>
    <div class="col-12 justify-content-center pt-5">
        <h3>Les anciens qui ont fait leur stage dans cette entreprise</h3>
        <div>
        Développement à venir select des stagiaires dont le Traineeshipsearch est positif avec cette entreprise.
    </div>
    </div>
</div>

@endsection
