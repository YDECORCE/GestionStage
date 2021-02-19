@extends('template')

@section('title')
Nouvelle Entreprise
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Ajouter une nouvelle Entreprise</h1>
    </div>
    <form method="POST" action="{{route('compagnies.store')}}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" placeholder="Nom de l'entreprise" />
                </div>
            </div>
            
        </div>
      
        <div class="col-12 px-0">
            <div class="form-group">
                <label>Adresse</label>
                <input type="text" name="adress" class="form-control" placeholder="Adresse de l'entreprise" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Code Postal</label>
                    <input type="text" name="postalcode" class="form-control" placeholder="Code Postal de l'entreprise" />
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Ville</label>
                    <input type="text" name="city" class="form-control" placeholder="Ville de l'entreprise" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Numéro de téléphone</label>
                    <input type="text" name="phonenumber" class="form-control"
                        placeholder="Numéro de téléphone" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="email de l'entreprise" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Site Web</label>
                    <input type="text" name="website" class="form-control" placeholder="Site Web" />
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
</div>
@endsection
