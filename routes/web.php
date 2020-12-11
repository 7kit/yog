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
Route::get('/algroup', 'FiltresController@algroup')->name('algroup');

Route::get('/produits', 'ProduitController@index')->name('produits');
Route::post('/produits.store', 'ProduitController@store')->name('produits.store');
Route::patch('/produits.update', 'ProduitController@update')->name('produits.update');
Route::delete('/produits/{id}/delete', 'ProduitController@destroy')->name('produits.delete');

Route::get('/clients', 'ClientController@index')->name('clients');
Route::post('/clients.store', 'ClientController@store')->name('clients.store');
Route::patch('/clients.update', 'ClientController@update')->name('clients.update');
Route::delete('/clients/{id}/delete', 'ClientController@destroy')->name('clients.delete');

Route::get('/encaissements', 'EncaissementController@index')->name('encaissements');
Route::post('/encaissements.store', 'EncaissementController@store')->name('encaissements.store');
Route::patch('/encaissements.update', 'EncaissementController@update')->name('encaissements.update');
Route::delete('/encaissements/{id}/delete', 'EncaissementController@destroy')->name('encaissements.delete');

Route::get('/factures', 'FactureController@index')->name('factures');
Route::post('/factures.store', 'FactureController@store')->name('factures.store');
Route::patch('/factures.update', 'FactureController@update')->name('factures.update');
Route::delete('/factures/{id}/delete', 'FactureController@destroy')->name('factures.delete');

Route::get('/details/{id}', 'DetailFactureController@index')->name('details');
Route::post('/details.store', 'DetailFactureController@store')->name('details.store');
Route::patch('/details.update', 'DetailFactureController@update')->name('details.update');
Route::patch('/details/{id}/delete', 'DetailFactureController@destroy')->name('details.delete');

Route::get('/filtres', 'FiltresController@show')->name('filtres');
Route::post('/filtres.process', 'FiltresController@process')->name('filtres.process');

Route::get('/filtresFacture/{debut}/{fin}/{idclient}', 'FiltresController@showFacture')->name('filtresFacture');
Route::post('/filtresFacture.process', 'FiltresController@processFacture')->name('filtresFacture.process');

Route::get('/filtresEncaissement/{debut}/{fin}/{idclient}', 'FiltresController@showEncaissement')->name('filtresEncaissement');
Route::post('/filtresEncaissement.process', 'FiltresController@processEncaissement')->name('filtresEncaissement.process');

Route::get('/types', 'TypeDepenseController@index')->name('types');
Route::post('/types.store', 'TypeDepenseController@store')->name('types.store');
Route::patch('/types.update', 'TypeDepenseController@update')->name('types.update');
Route::delete('/types/{id}/delete', 'TypeDepenseController@destroy')->name('types.delete');

Route::get('/depenses/{id}', 'DepenseController@index')->name('depenses');
Route::post('/depenses.store', 'DepenseController@store')->name('depenses.store');
Route::patch('/depenses.update', 'DepenseController@update')->name('depenses.update');
Route::delete('/depenses/{id}/delete', 'DepenseController@destroy')->name('depenses.delete');

// Ajout comptant pour la deuxieme version !
Route::get('/typeproduits', 'TypeProduitController@index')->name('typeproduits');
Route::post('/typeproduits.store', 'TypeProduitController@store')->name('typeproduits.store');
Route::patch('/typeproduits.update', 'TypeProduitController@update')->name('typeproduits.update');
Route::delete('/typeproduits/{id}/delete', 'TypeProduitController@destroy')->name('typeproduits.delete');

Route::get('/productions', 'ProductionsController@index')->name('productions');
Route::post('/productions.store', 'ProductionsController@store')->name('productions.store');
Route::patch('/productions.update', 'ProductionsController@update')->name('productions.update');
Route::delete('/productions/{id}/delete', 'ProductionsController@destroy')->name('productions.delete');

Route::delete('/perimes', 'ProductionsController@destroy')->name('perimes');