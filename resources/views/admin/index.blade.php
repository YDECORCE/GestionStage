@extends('template')

@section('title')
Dashboard {{Auth::user()->name}}
@endsection

@section('content')
<h1 class="mb-5"> Bonjour {{Auth::user()->name}}</h1>

<h5 class="mb-3">Sélectionnez la / les promotion(s) à contrôler</h5>
@livewire('dashboard-admin-filter', ['promos' => $promos])        

@endsection