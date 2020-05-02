<?php

namespace App\Http\Controllers;

use App\Article;
use App\Lecteurrequest;
use App\Redacteurrequest;
use App\Abonnement;
class WelcomeController extends Controller
{
    public function index() {
        $articles = Article::latest()->take(5)->get();
        $abonnements = Abonnement::all();
        $allArticles = Article::all();
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('welcome',compact('articles','lecteurcount','redacteurcount', 'abonnements','allArticles'));
    }
}
  