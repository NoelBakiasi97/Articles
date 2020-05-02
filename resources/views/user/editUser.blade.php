@extends('layouts/app')

@section('content')
    @if(Auth::user()->id_role==1)
        <div class="container">
            <div class="text-center">
                <h1>Edit user</h1>
            </div>
            <div class="card-body">
            <form action="{{route('updateUser',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name) }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
          
 
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
       
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('role') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="id_role" id="id_role">
                            @foreach ($roles as $role)
                                @if ($role->id==1)
                                @else
                                    @if ($role->id===$user->id_role)
                                        <option selected value="{{$role->id}}">{{$role->role}}</option>
                                    @else
                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                    
                

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('users')}}" class="btn btn-primary">Annuler</a>

                </div>
               
            </form>

            </div>
        </div>
    @else
        <h1 class="text-danger">Vous ne possédez pas les droits nécessaires</h1> 
    @endif
    
@endsection