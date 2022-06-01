<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::post('/admin', 'HomeController@affiche')->name('home.affiche');



//admin panel
Route::group(['prefix'=>'/admin','middleware'=>['auth']],function(){

// employe
Route::get('/employe/liste', 'EmployeController@index')->name('employe.index');
Route::get('/employe/ajouter','EmployeController@create')->name('employe.create');
Route::post('/employe/ajouter','EmployeController@store')->name('employe.store');
Route::get('/employe/edit/{id}','EmployeController@edit')->name('employe.edit');
Route::resource('employe','EmployeController');
// fournisseur
Route::get('/fournisseur/liste', 'FournisseurController@index')->name('fournisseur.index');
Route::get('/fournisseur/ajouter','FournisseurController@create')->name('fournisseur.create');
Route::post('/fournisseur/ajouter','FournisseurController@store')->name('fournisseur.store');
Route::resource('fournisseur','FournisseurController');
// commande
Route::get('/commande/liste', 'CommandeController@index')->name('commande.index');
Route::get('/commande/ajouter','CommandeController@create')->name('commande.create');
Route::post('/commande/ajouter','CommandeController@store')->name('commande.store');
Route::post('/commande/modifier','CommandeController@modifier')->name('commande.modifier');
Route::get('/commande/pdf/{id}','CommandeController@pdf')->name('commande.pdf');
Route::resource('commande','CommandeController');
// produit
Route::get('/produit/liste', 'ProduitController@index')->name('produit.index');
Route::get('/produit/accepter/liste', 'ProduitController@accepter')->name('produit.accepter');
Route::get('/produit/accepter/liste/{id}', 'ProduitController@modifier')->name('produit.modifier');

Route::get('/produit/imprimer', 'ProduitController@show')->name('produit.show');
Route::get('/produit/ajouter','ProduitController@create')->name('produit.create');
Route::post('/produit/ajouter','ProduitController@store')->name('produit.store');
Route::get('/produit/edit/{id}','ProduitController@edit')->name('produit.edit');

Route::get('/produit/tous', 'ProduitController@detail')->name('produit.detail');
Route::get('/produit/tous/action', 'ProduitController@action')->name('live_search.action');


Route::resource('produit','ProduitController');
// annonce
Route::get('/annonce/liste', 'AnnonceController@index')->name('annonce.index');
Route::get('/annonce/ajouter','AnnonceController@create')->name('annonce.create');
Route::post('/annonce/ajouter','AnnonceController@store')->name('annonce.store');
Route::resource('annonce','AnnonceController');
// client
Route::get('/client/liste', 'ClientController@index')->name('client.index');
Route::get('/client/ajouter','ClientController@create')->name('client.create');
Route::post('/client/ajouter','ClientController@store')->name('client.store');
Route::get('/client/edit/{id}','ClientController@edit')->name('client.edit');
Route::resource('client','ClientController');
// dtailcommandes
Route::get('/detailcommandes/edit/{id}','DetailcommandesController@edit')->name('detailcommandes.edit');
Route::resource('detailcommandes','DetailcommandesController');
// charge
Route::get('/charge/liste', 'ChargeController@index')->name('charge.index');
Route::get('/charge/ajouter','ChargeController@create')->name('charge.create');
Route::post('/charge/ajouter','ChargeController@store')->name('charge.store');
Route::get('/charge/edit/{id}','ChargeController@edit')->name('charge.edit');
Route::resource('charge','ChargeController');

// categorie
Route::get('/categorie/liste', 'CategorieController@index')->name('categorie.index');
Route::get('/categorie/ajouter','CategorieController@create')->name('categorie.create');
Route::post('/categorie/ajouter','CategorieController@store')->name('categorie.store');
Route::get('/categorie/edit{id}','CategorieController@edit')->name('categorie.edit');
Route::resource('categorie','CategorieController');
// message
Route::get('/message/liste', 'MessageController@index')->name('message.index');
Route::post('/contact','MessageController@store')->name('message.store');
Route::get('/message/lire','MessageController@update')->name('message.update');
Route::resource('message','MessageController');
// parametre
Route::get('/parametres/modifier','ParametresController@modifier')->name('parametres.modifier');
Route::post('/parametres/mode','ParametresController@mode')->name('parametres.mode');

Route::resource('parametres','ParametresController');




















    });




