@extends('layouts.master')
@section('content')
    @include('components.nav')
    <div class="text-center container">
        <h1 class="text-white shadow-lg p-3 mt-3 mb- bg-primary rounded">{{$article->titre}}</h1>
         @can('abon')
            @if (Auth::check()&&Auth::user()->id_role!=2)
                @if ($abonnements->where('id_article',$article->id)->where('id_user',Auth::id())->first())
                    <a href="{{route('deleteAbonnement', $article->id)}}" class="btn btn-outline-danger">Se désabonner</a>
                @else
                    <a href="{{route('saveAbonnement', $article->id)}}" class="btn btn-outline-light">S'abonner</a>
                @endif
            @endif
         @endcan   
            

    </div>
    <div class="text-center">
    <img src="{{asset('storage/'.$article->img)}}" alt="">
    </div>

    <div class="container text-center my-3"> 
        <p>{{$article->contenu}}</p>

    </div>
    <div class="text-center">
        <div class="text-center"> <a class="btn btn-primary" href="{{route('articles')}}">Voir les autres articles</a></div>

    </div>
    
@endsection