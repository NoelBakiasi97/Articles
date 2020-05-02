@extends('layouts/app')

@section('content')
        

        <div class="mb-5 container">
            <div class="text-center">

                <h1 class="text-white shadow-lg p-3 mt-3 mb- bg-primary rounded">Demande pour devenir Lecteur</h1>
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
                    @foreach ($lecteurrequests as $lecteurrequest)
                    <tr>
                        @foreach ($users->where('id',$lecteurrequest->id_user) as $user)
                            {{-- @if ($user->id==$lecteurrequest->id_user) --}}
                                <th scope="row" class="text-center">{{$user->id}}</th>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">
                                    @foreach ($roles->where('id',$user->id_role) as $role)
                                        {{-- @if ($user->id_role == $role->id) --}}
                                            {{$role->role}}
                                        {{-- @endif --}}
                                    @endforeach
                                </td>
                                
                                <td class="d-flex justify-content-around ">  
                                 
                                        <a class="btn btn-success" href="{{route('acceptLecteurRequest',$user->id)}}">Accepter la demande</a>   
                           
                                </td>
                            {{-- @endif --}}
                            
                        @endforeach
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   
@endsection