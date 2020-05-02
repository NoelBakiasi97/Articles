<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecteurrequest;
use App\Redacteurrequest;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class RedacteurrequestController extends Controller
{
    public function index(){
        $redacteurrequests = Redacteurrequest::all();
        $users = User::all();
        $roles = Role::all();
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('redacteurs/redacteurRequest',compact('redacteurrequests','users','roles','lecteurcount','redacteurcount'));
    }
    
    public function store(Request $request)
    { 
         
        $redacteurrequests = new Redacteurrequest();
        $redacteurrequests->id_user = Auth::id(); 
        $redacteurrequests->save();

        return view('demande');
    } 
     
    public function destroy($id)
    {
        $user = User::find($id);
        $user->id_role = 4;
        $user->save() ;

        $redacteurrequest = Redacteurrequest::where('id_user', $id);
        $redacteurrequest->delete();

        return redirect()->route('redacteurRequests');
    }
}

