@extends('layouts.master')
@section('content')
@include('components.nav')
@error('msg')
	<div class="alert alert-danger">{{$message}}</div>
@enderror

    @if (Auth::check())
        
        @include('news') 
        
        @if (Auth::user()->id_role==2)
            @include('utilisateur')
        @endif
        @if (Auth::user()->id_role==3)
            @include('lecteur')
        @endif
        @if (Auth::user()->id_role==4)
            @include('redacteur')
        @endif
    


    


    @else
        <div class="container">
            <div class="text-center  mt-5 pb-5">

                <h1 class="text-white shadow-lg p-3 mt-3 mb- bg-primary rounded"><b>Our articles</b></h1>
                <h2 class="rounded">Register or Login ah gros</h2>
            </div>
            <div class="text-center ">
                <ul class="" style="list-style:none">

                    <li>
                        <a class="btn btn-secondary my-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li >
                            <a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    @endif
    
    {{-- @if (Auth::user()->id_role!=2)
        @include('abonnements')
    @endif --}}      

    
@endsection