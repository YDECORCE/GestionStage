@extends('template')

@section('title')
Suivi Candidature {{$traineeship->trainee->name}}
@endsection

@section('content')

<div class="container justify-content-center">
    
    <div class="col-12 mt-2">
        <h1>Fiche de suivi de candidature</h1>
        <h3>Entreprise : {{$traineeship->compagny->name}}</h3>
         <h4>Date de candidature : {{date('D d M Y', strtotime($traineeship->dateofdemand))}}</h4>
    </div>
    <div class="col-12 mt-5">
    <form action="{{route('traineeships.update', $traineeship->id)}}" method="post">
        @csrf
        @method("PUT")
        <input hidden name="trainee_id" value="{{$traineeship->trainee_id}}">
        <input hidden name="compagny_id" value="{{$traineeship->compagny_id}}">
        <input hidden name="dateofdemand" value="{{$traineeship->dateofdemand}}">
        <div class="form-group">
            <label>Si vous avez effectué une relance auprès de cette entreprise, saisir la date de relance</label>
            <input type="date" name="relaunchdate" class="form-control" placeholder="date de la relance" />
        </div>
        <div class="form-group">
            <label>Si vous avez effectué obtenu un entretien avec cette entreprise, saisir la date de l'entretien</label>
            <input type="date" name="dateofinterview" class="form-control" placeholder="date de l'entretien" />
        </div>
        <div class="form-group">
            <label>Précisez le status de votre candidature</label>
            <select name="status" id="" class="form-control" >
                <option value="En Attente" {{ $traineeship->status === "En Attente" ? 'selected' : ''}}>En attente</option>
                <option value="Relancée" {{ $traineeship->status === "Relancée" ? 'selected' : ''}}>Entreprise Relancée</option>
                <option value="Positive" {{ $traineeship->status === "Positive" ? 'selected' : ''}}>Réponse positive de l'entreprise</option>
                <option value="Négative" {{ $traineeship->status === "Négative" ? 'selected' : ''}}>Réponse négative de l'entreprise</option>
                <option value="Déclinée" {{ $traineeship->status === "Déclinée" ? 'selected' : ''}}>J'ai décliné l'offre de stage</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer mon suivi</button>
    </form>
</div>

</div> 

@endsection