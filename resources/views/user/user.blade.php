@extends('layouts/app')

@section('content')
        

        <div class="mb-5 container">
            <div class="text-center">

                <h1 class="text-white shadow-lg p-3 mt-3 mb- bg-primary rounded">Users</h1>
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
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row" class="text-center">{{$user->id}}</th>
                        <td class="text-center">{{$user->name}}</td>
                        <td class="text-center">{{$user->email}}</td>
                        <td class="text-center">
                            @foreach ($roles as $role)
                                @if ($user->id_role == $role->id)
                                    {{$role->role}}
                                @endif
                            @endforeach
                        </td>
                        
                        <td class="text-center">  
                            @if ($user->id_role!=1)
                                <a class="btn btn-warning" href="{{route('editUser',$user->id)}}">edit</a>   
                                <a class="btn btn-danger" href="{{route('deleteUser',$user->id)}}">delete</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   
@endsection