@extends('templateregister')

@section('title')
Nouveau Stagiaire
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <h5>L'ensemble des champs doit être complété !!!</h5>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <h1>Créez votre compte stagiaire</h1>
    </div>
    <form method="POST" action="{{route('trainees.store')}}" enctype="multipart/form-data">
        @csrf
        <input hidden name='user_id' value="{{Auth::user()->id}}">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" placeholder="Nom du stagiaire" />
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Prénom du stagiaire" />
                </div>
            </div>
        </div>
        <div class="col-12 px-0">
            <div class="form-group">
                <label for="promo">Promotion</label>
                <select name="promo" class="form-control">
                    <option value="">Choisir la promotion</option>
                    @foreach ($promos as $promo)
                    <option value="{{$promo->id}}">{{$promo->year.' / '.$promo->city}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 px-0">
            <div class="form-group">
                <label>Adresse</label>
                <input type="text" name="adress" class="form-control" placeholder="Adresse du stagiaire" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Code Postal</label>
                    <input type="text" name="postalcode" class="form-control" placeholder="Code Postal du stagiaire" />
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Ville</label>
                    <input type="text" name="city" class="form-control" placeholder="Ville du stagiaire" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Numéro de portable</label>
                    <input type="text" name="phonenumber" class="form-control"
                        placeholder="Numéro de portable du stagiaire" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Avatar</label>
                        <input type="file" name="image" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Lien vers Portfolio</label>
                    <input type="url" name="portfolio" class="form-control" placeholder="Lien vers portfolio" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Lien Github</label>
                    <input type="url" name="github" class="form-control" placeholder="Lien vers Github" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Lien vers CV</label>
                    <input type="url" name="cv" class="form-control" placeholder="Lien vers CV" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="mobility">Mobilité</label>
            <select name="mobility" class="form-control">
                <option value="">Etes-vous mobile?</option>
                <option value=1>Oui</option>
                <option value=0>Non</option>              
            </select>
            <div>
                <label>Zone de mobilité</label>
                <select name="mobilityzone" class="form-control">
                    <option value="none">Aucune</option>
                    <option value="Département">Département</option>
                    <option value="Région">Région</option>
                    <option value="Nationale">Nationale</option>
                    <option value="Internationale">Internationale</option>
                                
                </select>
            </div>
        </div>
      
          <div class="form-group">
            <label>Sélectionner les compétences</label>
            <div class="row">
              @foreach ($skills as $skill)
              <div class="col-2 my-2">
                  <input type="checkbox" name="skills[]" value="{{$skill->id}}" class="mr-2">{{$skill->name}}
                </div> 
              @endforeach
            </div>
            
          </div>


        <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
</div>
@endsection
