@section('nav')
    @include('layouts.navbar')
@endsection
    <h2>Titre possible</h2>
    <p>Bienvenue dans votre interface d'apprenant , venez ici gerer pas mal de truc</p>

    <ul class="nav nav-tabs">
        <li class="active"><a href="/home#accueil">Accueil</a></li>
        <li><a href="#profil">Profil</a></li>
        <li><a href="#library">Librairie</a></li>
    </ul>

    <div class="tab-content">
        <div id="profil" class="tab-pane fade in active">
            <h3>Accueil</h3>
            <p>Ceci est l'accueil quand vous arrivez sur votre dashboard</p>
        </div>
    </div>
