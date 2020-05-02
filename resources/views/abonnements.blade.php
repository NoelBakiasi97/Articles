<div>
    <h1 class="text-center">Vos abonnements</h1>
    <div class="row">
        @foreach ($abonnements->where('id_user',Auth::id()) as $abonnement)
            <div class="col-sm-4 my-3">
                <div class="card">
                    <div class="card-body">
                        @foreach ($allArticles->where('id',$abonnement->id_article) as $allArticle)
                            <h5 class="card-title">{{$allArticle->titre }}</h5>
                            <p class="card-text">{{$allArticle->description}}</p>
                            <a href="{{route('article',$allArticle->id)}} " class="btn btn-outline-primary">Voir article</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach  
    </div>
</div>