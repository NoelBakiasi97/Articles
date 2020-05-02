@extends('layouts.master')
@section('content')
@include('components.nav')
<div class="container">
    <div class="text-center">

        <h1 class="text-success">ERROR</h1>
        @error('msg')
	        <div class="alert alert-danger">{{$message}}</div>
        @enderror

    </div>
</div>
    
@endsection