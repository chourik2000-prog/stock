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


Route::get('/stock', function () {
    $articles = Article::all();
    return view('stocks\afficher',compact('articles'));
});

Route::get('/', function () {
    $accueils = Article::all();
    return view('accueil',compact('accueils'));
});

Route::get('/bilans', 'App\Http\Controllers\UserController@index');

Route::get('/categories', 'App\Http\Controllers\CategorieController@index');
Route::resource('categories', App\Http\Controllers\CategorieController::class);
Route::resource('demandes', App\Http\Controllers\DemandeController::class);
Route::resource('articles', App\Http\Controllers\ArticleController::class);
Route::resource('agents', App\Http\Controllers\AgentController::class);
Route::resource('approvisionnements', App\Http\Controllers\ApprovisionnementController::class);
Route::resource('stocks', App\Http\Controllers\StockController::class);
Route::resource('accueil', App\Http\Controllers\AccueilController::class);
Route::resource('pertes', App\Http\Controllers\PerteController::class);
Route::resource('fournisseurs', App\Http\Controllers\FournisseurController::class);




