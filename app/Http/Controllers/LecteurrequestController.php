<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecteurrequest;
use App\Redacteurrequest;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class LecteurrequestController extends Controller
{
    public function index(){
        $lecteurrequests = Lecteurrequest::all();
        $users = User::all();
        $roles = Role::all();
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('lecteurs/lecteurRequest',compact('lecteurrequests','users','roles','lecteurcount','redacteurcount'));
    }
    
    public function store(Request $request)
    {
        $lecteurrequests = new Lecteurrequest();
        $lecteurrequests->id_user = Auth::id();
        $lecteurrequests->save();

        return view('demande');     
    }     
 
    public function destroy($id)    
    {
        $user = User::find($id);
        $user->id_role = 3;
        $user->save() ;

        $lecteurrequest = Lecteurrequest::where('id_user', $id);
        $lecteurrequest->delete();

        return redirect()->route('lecteurRequest');
    }
    
}
