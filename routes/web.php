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
// caisses
Route::get('caisse/edit', 'CaisseController@edit');
Route::get('caisse/update', 'CaisseController@update');
Route::get('caisse/arrete', 'CaisseController@arreteCaisse');

//banques
Route::get('banque/edit', 'BanqueController@edit');
Route::get('banque/update', 'BanqueController@update');
Route::get('banque/arrete', 'BanqueController@arreteBanque');

//agences
Route::get('agences', 'AgenceController@index');
Route::get('agences/create', 'AgenceController@create');
Route::get('agences/store', 'AgenceController@store');
Route::get('agences/edit', 'AgenceController@edit');
Route::get('agences/update', 'AgenceController@update');

//fournisseurs
Route::get('fournisseurs', 'FournisseurController@index');
Route::get('fournisseurs/create', 'FournisseurController@create');
Route::get('fournisseurs/store', 'FournisseurController@store');
Route::get('fournisseurs/edit', 'FournisseurController@edit');
Route::get('fournisseurs/update', 'FournisseurController@update');

//fournitures
Route::get('fournitures', 'FournitureController@index');
Route::get('fournitures/create', 'FournitureController@create');
Route::get('fournitures/store', 'FournitureController@store');
Route::get('fournitures/edit', 'FournitureController@edit');
Route::get('fournitures/update', 'FournitureController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
