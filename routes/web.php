<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index' )->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// users v
Route::get('/users', 'UserController@index')->name('users');
Route::get('/editUser/{id}', 'UserController@edit')->name('editUser');
Route::post('/updateUser/{id}', 'UserController@update')->name('updateUser');
Route::get('/deleteUser/{id}', 'UserController@destroy')->name('deleteUser');

// myprofil  v
Route::get('/myProfil', 'ProfilController@index')->name('myProfil');
Route::get('/editMyProfil/{id}', 'ProfilController@edit')->name('editmyProfil'); 
Route::post('/updatemyProfil/{id}', 'ProfilController@update')->name('updatemyProfil'); 
Route::get('/deletemyProfil/{id}', 'ProfilController@destroy')->name('deletemyProfil'); 
                      
//lecteurrequests    
Route::get('/lecteurRequest', 'LecteurrequestController@index')->name('lecteurRequest')->middleware('verify.admin');
Route::get('/saveLecteurRequest', 'LecteurrequestController@store')->name('saveLecteurRequest')->middleware('verify.isUtilisateur');
Route::get('/acceptLecteurRequest/{id}', 'LecteurrequestController@destroy')->name('acceptLecteurRequest')->middleware('verify.admin');
 
//RedacteurrequestController
Route::get('/redacteurrequests', 'RedacteurrequestController@index')->name('redacteurRequests')->middleware('verify.admin');
Route::get('/saveRedacteurRequests', 'RedacteurrequestController@store')->name('saveRedacteurRequests')->middleware('verify.isLecteur');
Route::get('/acceptRedacteurRequests/{id}', 'RedacteurrequestController@destroy')->name('acceptRedacteurRequests')->middleware('verify.admin');

//articles v
Route::get('/articles', 'ArticleController@index')->name('articles');
Route::get('/addRedacteurRequests', 'ArticleController@create')->name('addArticle');
Route::post('/saveRedacteurRequests', 'ArticleController@store')->name('saveArticle');
Route::get('/editRedacteurRequests/{id}', 'ArticleController@edit')->name('editArticle');
Route::post('/updateRedacteurRequests/{id}', 'ArticleController@update')->name('updateArticle');
Route::get('/deleteRedacteurRequests/{id}', 'ArticleController@destroy')->name('deleteArticle');

//show un article 
Route::get('/article/{id}', 'NewsController@index')->name('article');

//ABONNEMENTS
Route::get('/saveAbonnement/{id}', 'AbonnementController@store')->name('saveAbonnement');
Route::get('/deleteAbonnement/{id}', 'AbonnementController@destroy')->name('deleteAbonnement');