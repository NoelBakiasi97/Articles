<div class="mx-5">
    <div class="text-center ">
        <h1 class="text-white shadow-lg p-3 mb-5 bg-gradient-primary rounded"><b> Voici les 5 derniers articles</b></h1>
    </div>

    <div class="row  d-flex justify-content-around">
    @foreach ($articles as $article)   
        <div class="col-2 px-0 ">
            <div class="card bg-primary text-white border-primary bord"  >
                <img src="{{asset('storage/'.$article->img)}}" class="card-img-top " alt="...">
                <div class="card-body">
                    <h5 class="card-title"><b>{{$article->titre}}</b>:</h5>
                    <p class="card-text">{{$article->description}}</p>
                    <div class="text-center">
                        <a href="{{route('article',$article->id)}} " class="btn btn-outline-light">Voir article</a>
                        @if (Auth::check()&&Auth::user()->id_role!=2)
                            @if ($abonnements->where('id_article',$article->id)->where('id_user',Auth::id())->first())
                                <a href="{{route('deleteAbonnement', $article->id)}}" class="btn btn-outline-danger">Se désabonner</a>
                            @else
                                <a href="{{route('saveAbonnement', $article->id)}}" class="btn btn-outline-light">S'abonner</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center my-5"><a class="btn btn-primary" href="{{route('articles')}}">Voir les autres articles</a></div>
</div>
