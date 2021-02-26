@extends('template')

@section('title')
Promo|Paramêtrage
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <h5>L'ensemble des champs doit être complété !!!</h5>
    </div>
@endif
<div class="col-12">
    <h2>Créer une nouvelle Promotion</h2>
    <form action="{{route('promos.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Année de la promotion</label>
            <input type="text" name="year" class="form-control" placeholder="Année de la promotion" />
        </div>
        <div class="form-group">
            <label>Lieu de formation</label>
            <input type="text" name="city" class="form-control" placeholder="Lieu de formation" />
        </div>
        <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-primary">Créer</button>
        </div>
    </form>
</div>

<div class="row">
    <h2>Dashboard Promotions</h2>
    <table class="table table-hover">
        <thead>
            <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Année</th>
                <th scope="col">Lieu de formation</th>
                <th scope="col">Nombre de Stagiaires</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($promos as $promo)
            <tr class="table-secondary">

                <th scope="row">{{$promo->id}}</th>
                <td>{{ $promo->year }}</td>
                <td>{{ $promo->city }}</td>
                <td>{{ $promo->trainees->count()}}</td>
                <form action="{{route('promos.update',$promo->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <td><select name="active" class="form-control">
                            <option value=1 {{ $promo->active === 1 ? 'selected' : ''}}>Active</option>
                            <option value=0 {{ $promo->active === 0 ? 'selected' : ''}}>Archivée</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-warning">Enregister les modifications</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
