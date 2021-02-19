@extends('template')

@section('title')
Détail Entreprise
@endsection

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-12 col-sm-4">
            <img src="{{asset('img/logocompagny.png')}}" alt="profil" class="img-fluid">
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
        <h3>Contacts</h3>
        <div>
        <table class="m-0">
            <thead>
                <tr class="table-active">
                    <th scope="col" style="width:15%">Prénom</th>
                    <th scope="col" style="width:15%">Nom</th>
                    <th scope="col" style="width:30%">Fonction</th>
                    <th scope="col" style="width:20%">Téléphone</th>
                    <th scope="col" style="width:20%">Email</th>
                  </tr>   
            </thead>
            <tbody>
                @foreach ($compagny->c_contacts as $contact)
                <tr class="table-light">
                    <td>{{$contact->firstname}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->function}}</td>
                    <td>{{$contact->phonenumber}}</td>
                    <td>{{$contact->email}}</td>
                </tr> 
                @endforeach
               
            </tbody>
        </table>
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
