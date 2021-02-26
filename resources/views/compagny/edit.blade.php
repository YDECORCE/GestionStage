@extends('template')

@section('title')
Edition : {{$compagny->name}}
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
        <h1>Edition : {{$compagny->name}}</h1>
    </div>
    <form method="POST" action="{{route('compagnies.update', $compagny->id)}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" value="{{$compagny->name}}" />
                </div>
            </div>
            
        </div>
      
        <div class="col-12 px-0">
            <div class="form-group">
                <label>Adresse</label>
                <input type="text" name="adress" class="form-control" value="{{$compagny->adress}}" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Code Postal</label>
                    <input type="text" name="postalcode" class="form-control" value="{{$compagny->postalcode}}" />
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Ville</label>
                    <input type="text" name="city" class="form-control" value="{{$compagny->city}}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Numéro de téléphone</label>
                    <input type="text" name="phonenumber" class="form-control" value="{{$compagny->phonenumber}}" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{$compagny->email}}" />
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Site Web</label>
                    <input type="url" name="website" class="form-control" value="{{$compagny->website}}" />
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
