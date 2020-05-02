<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use App\Abonnement;
use App\Lecteurrequest;
use App\Redacteurrequest;
 

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('verify.nonutilisateur');
    }

    public function index(){
        $articles = Article::all();
        $users = User::all();
        $abonnements = Abonnement::all();
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('articles/articles',compact('articles','users','redacteurcount','lecteurcount','abonnements'));
    }

    public function create()
    {
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('articles/addArticle', compact('redacteurcount','lecteurcount'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre'=>'required|unique:articles',
            'description'=>'required',
            'contenu'=>'required',
            'img'=>'required|image',
        ]);

        $img = $request->file('img');
        $newName = Storage::disk('public')->put('',$img);
        $articles = new Article();
        $articles->titre =  $request->input('titre');
        $articles->description =  $request->input('description');
        $articles->contenu =  $request->input('contenu');
        $articles->img =  $newName;
        $articles->id_user = Auth::id();
        $articles->save();

        return redirect()->route('articles');
    }
    public function edit($id)
    {
        $article = Article::find($id);
        $lecteurcount = Lecteurrequest::all()->count();
        $redacteurcount = Redacteurrequest::all()->count();
        return view('articles/editArticle',compact('article','redacteurcount','lecteurcount'));
    }
    public function update(Request $request, $id)
    { 
        $validatedData = $request->validate([
            'titre'=>'required|unique:articles,titre,'.$id,
            'description'=>'required',
            'contenu'=>'required',
            'img'=>'required|image',
        ]);
        $articles = Article::find($id);
        Storage::disk('public')->delete($articles->img);
        $img = $request->file('img');
        $newName = Storage::disk('public')->put('',$img);
        $articles->titre =  $request->input('titre');
        $articles->description =  $request->input('description');
        $articles->contenu =  $request->input('contenu');
        $articles->img =  $newName;    
        $articles->id_user = Auth::id();    
        $articles->save();

        return redirect()->route('articles');
    }

    public function destroy($id)
    {
        $articles = Article::find($id);
        Storage::disk('public')->delete($articles->img);
        $articles->delete();
        return redirect()->route('articles');
    }
}
