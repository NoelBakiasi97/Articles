<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Abonnement;
use App\User;
use App\Article;
use App\Lecteurrequest;
use App\Redacteurrequest;

class AbonnementController extends Controller
{
    public function store($id)
    {
        $abonnements = new Abonnement();
        $abonnements->id_user =  Auth::id();
        $abonnements->id_article = $id;
        $abonnements->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $abonnements = Abonnement::where('id_article',$id)->where('id_user',Auth::id())->first();
        $abonnements->delete();
        return redirect()->back();
    }

}

