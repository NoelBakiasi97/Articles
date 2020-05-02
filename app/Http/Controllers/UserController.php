<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Lecteurrequest;
use App\Redacteurrequest;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('verify.admin');
        //$this = NonController
    }
    
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('user/user',compact('users','roles','lecteurcount','redacteurcount'));
    }
   
    public function edit( $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('user/editUser',compact('user','roles','lecteurcount','redacteurcount'));
    }
    public function update(Request $request, $id)
    { 
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $users = User::find($id);
        $users->name = $request->input('name'); 
        $users->email = $request->input('email');
        $users->id_role = $request->input('id_role'); 
        $users->save();
        
        return redirect()->route('users');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('users');
    }
}
