<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{route('home')}}">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        @if (Auth::user())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Entreprises</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('compagnies')}}">Nos entreprises partenaires</a>
            <a class="dropdown-item" href="{{route('compagnies.create')}}">Nouvelle Entreprise</a>
            <a class="dropdown-item" href="{{route('compagnies.index')}}">CRUD Entreprise</a>
            <a class="dropdown-item" href="#">Saisir une offre de stage</a>
            
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Stagiaires</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('trainees.create')}}">Nouveau Stagiaire</a>
            <a class="dropdown-item" href="{{route('trainees.index')}}">CRUD Stagiaire</a>
            <a class="dropdown-item" href="#">Saisir une demande de stage</a>
            
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Paramétrage</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Gestion Promotion</a>
            <a class="dropdown-item" href="#">Gestion Compétences</a>
          </div>
        </li>
        
      
            
        @endif
        
      </ul>
      <ul class="navbar-nav ml-auto">
        @if (Auth::user())
        <li class="nav-item">
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