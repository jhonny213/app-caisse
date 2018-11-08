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
Route::get('achats/cmd', 'AchatController@cmd');
Route::get('/achats/refus', 'AchatController@refus');

Route::group(['middleware' => 'Gestionnaire'], function () {
    Route::post('achats/store', 'AchatController@store');
    Route::get('achats/create', 'AchatController@create');
    Route::get('achats/{id}/edit', 'AchatController@edit');
    Route::put('achats/{id}', 'AchatController@update');
    Route::delete('achats/{id}', 'AchatController@destroy');
});
Route::group(['middleware' => 'Directeur'], function () {
    Route::put('achats/cmd/valide/{id}', 'AchatController@valide');
    Route::put('achats/cmd/refuse/{id}', 'AchatController@refuse');
});
Route::group(['middleware' => 'admin'], function () {
    Route::post('achats/valide', 'AchatController@valide');
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
Route::put('fournisseurs/{id}', 'FournisseurController@update');
Route::delete('fournisseurs/blocke/{id}', 'FournisseurController@redestroy');

//fournitures
Route::resource('fournitures','FournitureController');

Route::post('fournitures/store', 'FournitureController@store');
Route::put('fournitures/{id}', 'FournitureController@update');
Route::delete('fournitures/blocke/{id}', 'FournitureController@redestroy');

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
    Route::get('alimentecaisse/{id}/edit','AlimentecaisseController@edit');
    Route::put('alimentecaisse/{id}','AlimentecaisseController@update');
    Route::delete('alimentecaisse/{id}', 'AlimentecaisseController@destroy');

    Route::get('alimentebanque/create','AlimentebanqueController@create');
    Route::post('alimentebanque/store','AlimentebanqueController@store');
    Route::get('alimentebanque/{id}/edit','AlimentebanqueController@edit');
    Route::put('alimentebanque/{id}','AlimentebanqueController@update');
    Route::delete('alimentebanque/{id}', 'AlimentebanqueController@destroy');
});


//arrete
Route::get('arretecaisse','ArretecaisseController@index');
Route::group(['middleware' => 'Gestionnaire'], function () {
    Route::get('arretecaisse/create','ArretecaisseController@create');
    Route::post('arretecaisse/store','ArretecaisseController@store');
});
//auth
Auth::routes();



