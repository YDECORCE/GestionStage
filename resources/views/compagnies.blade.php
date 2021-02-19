@extends('template')

@section('title')
    Accueil | Entreprises
@endsection

@section('content')
    <h1 class="text-center py-5">Nos entreprises partenaires</h1>
    <div class="container">
    <div class="articles row justify-content-center">
        @foreach ($compagnies as $compagny)
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card my-3">
                <h4 class="card-title text-center">
                    <a href="{{route('compagny',$compagny->id)}}">
                    {{ $compagny->name }}
                    </a>
                </h4>
                <h6><i class="fas fa-address-card mr-2"></i>
                    {{ $compagny->adress }}</h6>
                <h6><i class="fas fa-map-marked-alt mr-2"></i>
                    {{ $compagny->postalcode . ' ' . $compagny->city}}</h6>
                <h6><i class="fas fa-mobile-alt mr-2"></i>
                    {{ $compagny->phonenumber }}</h6>
                <h6><i class="far fa-envelope mr-2"></i>
                    {{ $compagny->email }}</h6>
                <h6><i class="fas fa-desktop mr-2"></i>
                    {{ $compagny->website }}</h6>
                
            </div>
        </div>
        @endforeach
    </div>
  <div class="d-flex justify-content-center mt-5">
    {{$compagnies->links('vendor/pagination/custom') }}
</div> 
    </div>

@endsection