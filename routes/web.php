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

Route::get('/', function () {
    return view('accueil');
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::resource('categories', App\Http\Controllers\CategorieController::class);
Route::resource('demandes', App\Http\Controllers\DemandeController::class);
Route::resource('articles', App\Http\Controllers\ArticleController::class);
Route::resource('agents', App\Http\Controllers\AgentController::class);


