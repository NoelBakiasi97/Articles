@extends('layouts.master')
@section('content')
    @include('components.nav')
    <div class="text-center">
        <h1>Editer mon article: "{{$article->titre}}" </h1>
    </div>
    



    <div class="card-body">
        <form action="{{route('updateArticle',$article->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('titre') }}</label>
                <div class="col-md-6">
                    <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre',$article->titre) }}" required autocomplete="titre" autofocus>
                    @error('titre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('img') }}</label>
                <div class="col-md-6">
                    <input id="img" type="file" class=" @error('img') is-invalid @enderror" name="img" value="{{ old('img',$article->img) }}" required autocomplete="img" autofocus>
                    @error('img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="contenu" class="col-md-4 col-form-label text-md-right">{{ __('contenu') }}</label>
                <div class="col-md-6">
                    <input id="contenu" type="text" class="form-control @error('contenu') is-invalid @enderror" name="contenu" value="{{ old('contenu',$article->contenu) }}" required autocomplete="contenu" autofocus>
                    @error('contenu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$article->description) }}" required autocomplete="description" autofocus>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-warning">Editer</button>
                <a href="{{route('articles')}}" class="btn btn-danger">annuler</a>
            </div>
        </form>
    </div>

@endsection