@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-5 container">
        <div class="text-center">
                
            <h1 class="text-white shadow-lg p-3 mt-3 mb- bg-primary rounded">My profile</h1>
        </div>
        <table class="table table-striped table-secondary">
            <thead class="bg-dark text-white">  
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Nom</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">role</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>   
                    <th scope="row" class="text-center">{{Auth::user()->id}}</th>
                    <td class="text-center">{{Auth::user()->name}}</td>
                    <td class="text-center">{{Auth::user()->email}}</td>
                    <td class="text-center">
                        @foreach ($roles as $role)
                            @if (Auth::user()->id_role == $role->id)
                                {{$role->role}}
                            @endif
                        @endforeach
                    </td>
                    
                    <td class="text-center">  
                        @if (Auth::user()->id_role==1)
                            <a class="btn btn-warning" href="{{route('editmyProfil',Auth::user()->id)}}">Edit</a>   
                        @else 
                            <a class="btn btn-warning" href="{{route('editmyProfil',Auth::user()->id)}}">Edit</a>   
                            <a class="btn btn-danger" href="{{route('deletemyProfil',Auth::user()->id)}}">Delete</a>
                        @endif
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
@endsection
