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

Route::get('/', 'Controller@index');
//ACHATS
Route::get('achats', 'AchatController@index');
Route::group(['middleware' => 'Gestionnaire'], function () {
    Route::post('achats/store', 'AchatController@store');
    Route::get('achats/create', 'AchatController@create');
    Route::get('achats/edit', 'AchatController@edit');
    Route::post('achats/update', 'AchatController@update');
});
//AGENCES
Route::group(['middleware' => 'admin'], function () {
    Route::resource('agences', 'AgenceController');
    Route::post('agences/store', 'AgenceController@store');
    Route::post('agences/update', 'AgenceController@update');
});
//fournisseurs
Route::resource('fournisseurs','FournisseurController');
Route::post('fournisseurs/store', 'FournisseurController@store');
Route::post('fournisseurs/update', 'FournisseurController@update');

//fournitures
Route::resource('fournitures','FournitureController');
Route::post('fournitures/store', 'FournitureController@store');
Route::post('fournitures/update', 'FournitureController@update');

//utilisateurs

Route::group(['middleware' => 'admin'], function () {
    Route::resource('utilisateurs','UserController');
    Route::post('utilisateurs/store', 'UserController@store');
});


//alimente

Route::get('alimentecaisse','AlimentecaisseController@index');
Route::get('alimentebanque','AlimentebanqueController@index');

Route::group(['middleware' => 'Gestionnaire'], function () {
    Route::get('alimentecaisse/create','AlimentecaisseController@create');
    Route::post('alimentecaisse/store','AlimentecaisseController@store');

    Route::get('alimentebanque/create','AlimentebanqueController@create');
    Route::post('alimentebanque/store','AlimentebanqueController@store');
});


//arrete
Route::get('arretecaisse','ArretecaisseController@index');
Route::group(['middleware' => 'Gestionnaire'], function () {
    Route::get('arretecaisse/create','ArretecaisseController@create');
    Route::post('arretecaisse/store','ArretecaisseController@store');
});
//auth
Auth::routes();



