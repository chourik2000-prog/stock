<?php
use App\Models\Agent;
use App\Models\Approvisionnement;
use App\Models\Demande;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController; 

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

Route::get('/stock', function () {
    $articles = Article::all();
    return view('stockS\afficher',compact('articles'));
});

Route::get('/categories', 'App\Http\Controllers\CategorieController@index');



Route::resource('categories', App\Http\Controllers\CategorieController::class);
Route::resource('demandes', App\Http\Controllers\DemandeController::class);
Route::resource('articles', App\Http\Controllers\ArticleController::class);
Route::resource('agents', App\Http\Controllers\AgentController::class);
Route::resource('approvisionnements', App\Http\Controllers\ApprovisionnementController::class);
Route::resource('stocks', App\Http\Controllers\StockController::class);





