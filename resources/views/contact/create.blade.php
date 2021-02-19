@extends('template')

@section('title')
Nouveau Contact
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Ajouter un nouveau contact</h1>
    </div>
    <form method="POST" action="{{route('c_contacts.store')}}">
        @csrf
        <input hidden type="text" name="compagny_id" value="{{$compagny_id}}"/>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" placeholder="Nom du Contact" />
                </div>
            </div>
            
        </div>
      
        <div class="col-12 px-0">
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="firstname" class="form-control" placeholder="Prénom du Contact" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Fonction</label>
                    <input type="text" name="function" class="form-control" placeholder="Fonction" />
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Numéro de téléphone</label>
                    <input type="text" name="phonenumber" class="form-control" placeholder="Numéro de téléphone" />
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="email du contact" />
                </div>
            </div>
            
        </div>
        <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
</div>
@endsection