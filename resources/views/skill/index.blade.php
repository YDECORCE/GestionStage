@extends('template')

@section('title')
Skills|Paramêtrage
@endsection

@section('content')

<div class="col-12">
    <h2>Créer une nouvelle compétence</h2>
    <form action="{{route('skills.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nom de la Compétence</label>
            <input type="text" name="skill" class="form-control" placeholder="Compétence" />
        </div>
        <div class="form-group">
            <label>Pictogramme récupéré sur le site FontAwesome (type 'fab fa-picto')</label>
            <input type="text" name="city" class="form-control" placeholder="Icone Font Awesome" />
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
