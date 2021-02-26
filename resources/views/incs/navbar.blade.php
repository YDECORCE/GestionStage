<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ml-5 mr-auto">
        @if (Auth::user())
        @if (Auth::user()->role==='ADMIN')
        <li class="nav-item ">
          <a class="nav-link" href="{{route('admins.index')}}">Tableau de bord
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Entreprises</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('compagnies')}}">Nos entreprises partenaires</a>
            <a class="dropdown-item" href="{{route('compagnies.create')}}">Nouvelle Entreprise</a>
            <a class="dropdown-item" href="{{route('compagnies.index')}}">CRUD Entreprise</a>
            {{-- <a class="dropdown-item" href="#">Saisir une offre de stage</a> --}}
            
          </div>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Paramétrage</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('promos.index')}}">Gestion Promotion</a>
            <a class="dropdown-item" href="{{route('skills.index')}}">Gestion Compétences</a>
          </div>
        </li>   
        @endif
        @if ((Auth::user()->role==='USER'))
        <li class="nav-item ">
          <a class="nav-link" href="{{route('trainees.show', Auth::user()->trainee->id)}}">Mon tableau de bord
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('trainees.edit', Auth::user()->trainee->id)}}">Editer mon profil
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Entreprises</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('compagnies')}}">Nos entreprises partenaires</a>
            <a class="dropdown-item" href="{{route('compagnies.create')}}">Nouvelle Entreprise</a>           
          </div>
        </li>   
        @endif   
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Home
                <span class="sr-only">(current)</span>
                </a>
            </li>
        @endif
        
        
        
      </ul>
      <ul class="navbar-nav ml-auto">
        @if (Auth::user())
        <li class="nav-item my-auto mr-2">
          <p class="mb-0">{{Auth::user()->name. ' est connecté.'}}</p>
        </li>  
        <li class="nav-item my-auto">
          <form method="post" action="{{route('logout')}}">
            @csrf
            <button type="submit" class="btn">Déconnexion</button>
          </form>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Me Connecter
            <span class="sr-only">(current)</span>
          </a>
        </li>
        @endif
        
        
      </ul>
    </div>
  </nav>