<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecteurrequest;
use App\Redacteurrequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('home', compact('lecteurcount','redacteurcount'));
    }
}
