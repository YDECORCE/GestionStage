@extends('template')

@section('title')
Under Construction
@endsection

@section('content')
<div class="container justify-content-center">  
    <h1>WTF je suis dans la page show du stagiaire</h1>
    <h2>{{$trainee->firstname.' '.$trainee->name}}</h2>
</div>
        

@endsection