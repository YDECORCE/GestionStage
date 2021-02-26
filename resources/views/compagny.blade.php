@extends('template')

@section('title')
{{ $compagny->name }}
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
    <div class="col-12 justify-content-center pt-5 w-100">
        <h3>Contacts</h3>
        <div>
            <table class="m-0 w-75">
                <thead>
                    <tr class="table-active">
                        <th scope="col" style="min-width:15%">Prénom</th>
                        <th scope="col" style="min-width:15%">Nom</th>
                        <th scope="col" style="min-width:30%">Fonction</th>
                        <th scope="col" style="min-width:20%">Téléphone</th>
                        <th scope="col" style="min-width:20%">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compagny->c_contacts as $contact)
                    <tr class="table-secondary">
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
        
        <?php $counter=0 ?>
        @if (count($compagny->traineeships)>0)
                @foreach ($compagny->traineeships as $stage)
                    @if ($stage->status==="Positive")
                        <?php $counter++ ?>
                        <div class="col-12 mt-3 d-flex">
                        <span class="badge badge-pill badge-warning mr-5">
                                {{$stage->trainee->promo->year. ' / '.$stage->trainee->promo->city}}
                        </span>
                        <a href="{{route('trainee',$stage->trainee->id)}}">
                            <h5 class="my-0">{{$stage->trainee->firstname.' '.$stage->trainee->name}}</h5>
                        </a>
                        </div>
                    @endif
                @endforeach
        @endif
        @if ($counter===0)
            <p> Pas encore d'ancien stagiaire dans cette entreprise </p>
        @endif


    </div>
</div>

@endsection
