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

/*Route::get('/', function () {
    return view('blank');
});*/

/*Route::get('/achat', function () {
    return view('welcome');
});*/

Route::get('/', 'FiltresController@show')->name('dashboard');

Route::get('/produits', 'ProduitController@index')->name('produits');
Route::post('/produits.store', 'ProduitController@store')->name('produits.store');
Route::patch('/produits.update', 'ProduitController@update')->name('produits.update');

Route::get('/clients', 'ClientController@index')->name('clients');
Route::post('/clients.store', 'ClientController@store')->name('clients.store');
Route::patch('/clients.update', 'ClientController@update')->name('clients.update');

Route::get('/encaissements', 'EncaissementController@index')->name('encaissements');
Route::post('/encaissements.store', 'EncaissementController@store')->name('encaissements.store');
Route::patch('/encaissements.update', 'EncaissementController@update')->name('encaissements.update');

Route::get('/factures', 'FactureController@index')->name('factures');
Route::post('/factures.store', 'FactureController@store')->name('factures.store');
Route::patch('/factures.update', 'FactureController@update')->name('factures.update');

Route::get('/details/{id}', 'DetailFactureController@index')->name('details');
Route::post('/details.store', 'DetailFactureController@store')->name('details.store');
Route::patch('/details.update', 'DetailFactureController@update')->name('details.update');

Route::get('/filtres', 'FiltresController@show')->name('filtres');
Route::post('/filtres.process', 'FiltresController@process')->name('filtres.process');

Route::get('/filtresFacture/{debut}/{fin}/{idclient}', 'FiltresController@showFacture')->name('filtresFacture');
Route::post('/filtresFacture.process', 'FiltresController@processFacture')->name('filtresFacture.process');

Route::get('/filtresEncaissement/{debut}/{fin}/{idclient}', 'FiltresController@showEncaissement')->name('filtresEncaissement');
Route::post('/filtresEncaissement.process', 'FiltresController@processEncaissement')->name('filtresEncaissement.process');
