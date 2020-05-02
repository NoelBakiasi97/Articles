<div class="container">
    <div class="text-center">
        <h1>Vous êtes lecteur</h1>

        @if (App\Redacteurrequest::where('id_user',Auth::id())->exists() )
            <h3 class="text-white shadow-lg p-3 mt-3 mb- bg-primary rounded">Vous avez deja fait votre demande</h3>
        @else
            <a class="btn btn-primary" href="{{route('saveRedacteurRequests')}}">Devenir redacteur</a>
        @endif 
    </div>
</div>       
                           