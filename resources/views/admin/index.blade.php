@extends('template')

@section('title')
Under Construction
@endsection

@section('content')
<h1> Bonjour {{Auth::user()->name}}</h1>
@if (count($trainees)>0)
<table class="table table-hover mt-5">
    <thead>
      <tr class="table-active">
        <th scope="col">Stagiaire</th>
        <th scope="col">Promo</th>
        <th scope="col">Total Demandes</th>
        <th scope="col">Total Relances</th>
        <th scope="col">Total Négatives</th>
        <th scope="col">Total Positives</th>
       
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach ($trainees as $data)
             
            <th scope="row">{{ $data->firstname.' '.$data->name}}</th>
            <td><span class="badge badge-pill badge-warning">
                {{$data->promo->year. ' / '.$data->promo->city}}
            </span></td>
            <td style="text-align:center"><span class="badge badge-info badgecounter">{{$data->traineeships->count()}}</span>
                
            </td>
            <td style="text-align:center"><span class="badge badge-warning badgecounter">{{$data->traineeships->where('status','Relancée')->count()}}</span>   
            </td>

            <td style="text-align:center"><span class="badge badge-danger badgecounter">{{$data->traineeships->where('status','Négative')->count()}}</span>   
            </td>

            <td style="text-align:center"><span class="badge badge-success badgecounter">{{$data->traineeships->where('status','Positive')->count()}}</span>   
            </td>
            
            
            <td class="d-flex">
                
                <a href="{{route('admins.show', $data->id)}}" >Détails</a>
             
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>
  
@else
    <h5> Pas de stagiaires enregistrées</h5>
@endif


        

@endsection