@extends('template')

@section('title')
Admin| MAJ Stagiaire
@endsection

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <h1>Editer ce stagiaire</h1>
    </div>
    <form method="POST" action="{{route('trainees.update', $trainee->id)}}">
        @method("PUT")
        @csrf
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" value="{{ $trainee->name}}" />
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" name="firstname" class="form-control" value="{{ $trainee->firstname}}" />
                </div>
            </div>
        </div>
        <div class="col-12 px-0">
            <div class="form-group">
                <label for="promo">Promotion</label>
                <select name="promo" class="form-control">
                    <option value="">Choisir la promotion</option>
                    @foreach ($promos as $promo)
                    <option value="{{$promo->id}}" {{ $promo->id === $trainee->promo->id ? 'selected' : ''}}>{{$promo->year.' / '.$promo->city}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 px-0">
            <div class="form-group">
                <label>Adresse</label>
                <input type="text" name="adress" class="form-control" value="{{ $trainee->adress}}" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Code Postal</label>
                    <input type="text" name="postalcode" class="form-control" value="{{ $trainee->postalcode}}" />
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Ville</label>
                    <input type="text" name="city" class="form-control" value="{{ $trainee->city}}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Numéro de portable</label>
                    <input type="text" name="phonenumber" class="form-control"
                    value="{{ $trainee->phonenumber}}" />
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $trainee->email}}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Lien vers Portfolio</label>
                    <input type="text" name="portfolio" class="form-control" value="{{ $trainee->portfolio}}" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Lien Github</label>
                    <input type="text" name="github" class="form-control" value="{{ $trainee->github}}" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Lien vers CV</label>
                    <input type="text" name="cv" class="form-control" value="{{ $trainee->cv}}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="mobility">Mobilité</label>
            <select name="mobility" class="form-control">
                <option value="">Etes-vous mobile?</option>
                <option value=1 {{ $trainee->mobility === 1 ? 'selected' : ''}}>Oui</option>
                <option value=0 {{ $trainee->mobility === 0 ? 'selected' : ''}}>Non</option>              
            </select>
            <div>
                <label>Zone de mobilité</label>
                <select name="mobilityzone" class="form-control">
                    <option value="none" {{ $trainee->mobilityzone === "none" ? 'selected' : ''}}>Aucune</option>
                    <option value="Dépatement" {{ $trainee->mobilityzone === "Département" ? 'selected' : ''}}>Département</option>
                    <option value="Région" {{ $trainee->mobilityzone === "Région" ? 'selected' : ''}}>Région</option>
                    <option value="Nationale" {{ $trainee->mobilityzone === "Nationale" ? 'selected' : ''}}>Nationale</option>
                    <option value="Internationale" {{ $trainee->mobilityzone === "Internationale" ? 'selected' : ''}}>Internationale</option>
                                
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
</div>
@endsection
