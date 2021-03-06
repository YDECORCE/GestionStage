@extends('template')

@section('title')
    Accueil
@endsection

@section('content')
@if (count($trainees)>0)
<h1 class="text-center py-5">Nos stagiaires recherchent un stage</h1>
<div class="container">
<div class="articles row justify-content-center">
    @foreach ($trainees as $trainee)
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="card my-3">
            <h5 class="card-title text-center">
                <a href="{{route('trainee',$trainee->id)}}">
                {{ $trainee->firstname . ' ' . $trainee->name }}
                </a>
            </h5>
            <div class="image" style="background-image:url({{asset('img/avatars/'.$trainee->avatar.'')}})">
            </div>
            <div class="d-flex justify-content-start pl-5 mt-2">
                <span class="badge badge-pill badge-warning">
                    {{$trainee->promo->year. ' / '.$trainee->promo->city}}
                </span>
            </div>
            <div class="card-body">
                
                <a href="{!! $trainee->portfolio !!}" target="blanck" class="btn btn-primary p-2"> <i
                        class="fas fa-laptop-code mr-2"></i>Portfolio</a>
                <a href="{!! $trainee->github !!}" target="blanck" class="btn btn-primary p-2"> <i
                            class="fab fa-github mr-2"></i>GitHub</a>    
                <a href="{!! $trainee->cv !!}" target="blanck" class="btn btn-primary p-2"> <i
                                class="fas fa-user-graduate mr-2"></i>CV</a>                  
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-5">
{{$trainees->links('vendor/pagination/custom') }}
</div> 
</div> 
@else
<h1 class="text-center py-5">Désolé actuellement tous nos stagiaires ont trouvé une entreprise</h1>   
@endif


@endsection