@extends('layouts/app')

@section('content')
        <div class="container">
            <div class="text-center">
                
                <h1>add article</h1>
            </div>
            <form action="{{route('saveArticle')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titre">titre</label>
                    <input value="@if($errors->first('titre'))@else{{old('titre')}}@endif"
                    type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" id="titre" >
                    @error('titre')
                        <div  class="alert alert-danger">{{  $message  }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="img">image</label> <br>
                    <input value="@if($errors->first('img'))@else{{old('img')}}@endif"
                    type="file" name="img" class=" @error('img') is-invalid @enderror" id="img" >
                    @error('img')
                        <div  class="alert alert-danger">{{  $message  }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input value="@if($errors->first('description'))@else{{old('description')}}@endif"
                    type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" >
                    @error('description')
                        <div  class="alert alert-danger">{{  $message  }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contenu">contenu</label>
                    <textarea  type="text" name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10">@if($errors->first('contenu'))@else{{old('contenu')}}@endif</textarea>
                    @error('contenu')
                        <div  class="alert alert-danger">{{  $message  }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    
 
        



    
@endsection