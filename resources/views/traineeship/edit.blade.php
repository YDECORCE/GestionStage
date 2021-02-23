@extends('template')

@section('title')
Under Construction
@endsection

@section('content')
<div class="container d-flex justify-content-center">  
    <img src="{{asset('img/under-construction.png')}}" alt="profil" style="height:80vh; width:auto">
</div>
   @dump($traineeship)     

@endsection