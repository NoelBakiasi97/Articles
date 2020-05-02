<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Lecteurrequest;
use App\Redacteurrequest;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('roles/roles',compact('roles','lecteurcount','redacteurcount'));
    }
    public function create()
    {
        return view('roles/addRole');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role'=>'required|unique:roles',
        ]);
        $roles = new Role();
        $roles->role =  $request->input('role');
        $roles->save();

        return redirect()->route('roles');
    }
    public function edit($id)
    {
        $role = Role::find($id);
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('roles/editRole',compact('role','lecteurcount','redacteurcount'));
    }
    public function update(Request $request, $id)
    { 
        $validatedData = $request->validate([
            'role'=>'required|unique:roles,role,'.$id,
        ]);
        $roles = Role::find($id);
        $roles->role =  $request->input('role');
        $roles->save();

        return redirect()->route('roles');
    }

    public function destroy($id)
    {
        $roles = Role::find($id);
        $roles->delete();
        return redirect()->route('roles');
    }
}
