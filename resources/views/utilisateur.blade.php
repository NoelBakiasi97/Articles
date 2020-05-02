<div class="container">
    <div class="text-center mb-5">
        <h1 class="text-white shadow-lg p-3 mt-3 mb- bg-primary rounded">Vous êtes utilisateur</h1>
       
        @if (App\Lecteurrequest::where('id_user',Auth::id())->exists() )
            <h3>Vous avez deja fait votre demande</h3>
        @else
            <a class="btn btn-primary" href="{{route('saveLecteurRequest')}}">Devenir lecteur</a>
        @endif
    
    
    </div>


</div>
