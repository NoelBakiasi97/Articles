<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Lecteurrequest;
use App\Redacteurrequest;


class ProfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()   
    {
        $users = User::all();
        $roles = Role::all();
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        if (Auth::check()) {
            
            return view('user/myprofil',compact('users','roles','lecteurcount','redacteurcount'));
        }else {
            return redirect()->back();
        }
    }
     public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('user/editMyprofil',compact('user','roles','lecteurcount','redacteurcount'));
    }
     public function update(Request $request, $id)
    {   
        if (Auth::id()== $id) {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
            ]);
                $users = User::find($id);
    
                $users->name = $request->input('name');
                $users->email = $request->input('email');
               
                $users->save();
                return redirect()->route('myProfil');
        } else {
            return redirect()->back();        
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('welcome');
    }   
}
