@extends('layouts.master')
@section('content')
    @include('components.nav')

    <div class="mb-5 container">
        <div class="text-center">
            
            <h1 class="text-white shadow-lg p-3 mt-3 mb- bg-primary rounded">Articles </h1>
        </div>
        <div class="container text-center">
            <a class="btn btn-success my-2" href="{{route('addArticle')}}">ajouter une article </a>
        </div>
                <table class="table table-striped table-secondary ">
                    <thead class="bg-dark text-white ">
                        <tr>
                            <th scope="col" class="text-center">Id</th>
                            <th scope="col" class="text-center">titre</th>
                            <th scope="col" class="text-center">description</th>
                            <th scope="col" class="text-center">image</th>
                            <th scope="col" class="text-center">auteur</th>
                            <th scope="col" class="text-center">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <th scope="row" class="text-center">{{$article->id}}</th>
                            <td class="text-center">{{$article->titre}}</td> 
                            <td class="text-center">{{$article->description}}</td> 
                            <td class="text-center"><img class="w-25" src="{{asset('storage/'.$article->img)}}" alt=""></td> 
                            <td class="text-center">
                                @foreach ($users as $user)
                                    @if ($article->id_user == $user->id) 
                                        {{$user->name}}
                                    @endif
                                @endforeach
                            </td> 
                            <td class="d-flex">
                                @if (Auth::user()->id_role==1 ||Auth::id()==$article->id_user && Auth::user()->id_role==4)
                                    <a class="btn btn-warning" href="{{route('editArticle',$article->id)}}">Edit</a>
                                    <a class="btn btn-danger mx-1" href="{{route('deleteArticle',$article->id)}}">Delete</a>
                                @endif
                                @if (Auth::check()&&Auth::user()->id_role!=2)
                                    @if ($abonnements->where('id_article',$article->id)->where('id_user',Auth::id())->first())
                                        <a href="{{route('deleteAbonnement', $article->id)}}" class="btn btn-outline-danger">Se désabonner</a>
                                    @else
                                        <a href="{{route('saveAbonnement', $article->id)}}" class="btn btn-outline-light">S'abonner</a>
                                    @endif
                                @endif
                                <a class="btn btn-success mx-auto" href="{{route('article',$article->id)}}">Lire</a>
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
    
    
    
    


    
@endsection