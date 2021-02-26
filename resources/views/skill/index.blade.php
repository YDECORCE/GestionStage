@extends('template')

@section('title')
Skills|Paramêtrage
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <h5>L'ensemble des champs doit être complété !!!</h5>
    </div>
@endif
<div class="col-12">
    <h2>Créer une nouvelle compétence</h2>
    <form action="{{route('skills.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nom de la Compétence</label>
            <input type="text" name="name" class="form-control" placeholder="Compétence" />
        </div>
        <div class="form-group">
            <label>Pictogramme récupéré sur le site <a href="https://fontawesome.com/" target="blanck">FontAwesome</a> (type 'fab fa-picto')</label>
            <input type="text" name="icon" class="form-control" placeholder="Code Icone Font Awesome" />
        </div>
        <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-primary">Créer</button>
        </div>
    </form>
</div>

<div class="col-12">
    <h2>Dashboard compétences</h2>
    <table class="table table-hover">
        <thead>
            <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Code icone</th>
                <th scope="col">Icone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skills as $skill)
            <tr class="table-secondary">

                <th scope="row">{{$skill->id}}</th>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->icon }}</td>
                <td><i class="{{$skill->icon}}"></i></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
