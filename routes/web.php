<?php
use App\Models\Agent;
use App\Models\Approvisionnement;
use App\Models\Demande;
use App\Models\Article;
use App\Models\Annee;
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
    $annees = Annee::all();
    $homes = Article::all();
    return view('homeeee',compact('homes'))->with('annees', $annees);
});
// ->middleware('auth');
Route::get('homeee', 'App\Http\Controllers\GestaccueilController@index')
    ->name('homeee');

// header 
Route::get('deskapp/header', 'App\Http\Controllers\TerminerController@index');
/**
 * bilans.
 */
Route::get('/bilans', 'App\Http\Controllers\BilanController@index');
Route::get('/bilans/store/{id_article}', 'App\Http\Controllers\BilanController@store')->name('bilanChart');
Route::get('/bilans/recherche', 'App\Http\Controllers\BilanController@recherche')->name('rechercheform');
Route::post('/bilans/recherche', 'App\Http\Controllers\BilanController@recherche');

/**
 * approv.
 */

Route::get('/approvisionnements/recherche', 'App\Http\Controllers\ApprovisionnementController@recherche')
    ->name('approv.rech');
Route::post('/approvisionnements/recherche', 'App\Http\Controllers\ApprovisionnementController@recherche');
Route::resource('approvisionnements', App\Http\Controllers\ApprovisionnementController::class);
/**
 * commandes.
 */
Route::get('/commandes/recherche', 'App\Http\Controllers\CommandeController@recherche')
    ->name('comm.rech');
Route::post('/commandes/recherche', 'App\Http\Controllers\CommandeController@recherche');
Route::resource('commandes', App\Http\Controllers\CommandeController::class);
/**
 * commandes.
 */
Route::get('/demandes/recherche', 'App\Http\Controllers\DemandeController@recherche')
    ->name('demande.rech');
Route::post('/demandes/recherche', 'App\Http\Controllers\DemandeController@recherche');
Route::resource('demandes', App\Http\Controllers\DemandeController::class);
/**
 * pertes.
 */
Route::get('/pertes/recherche', 'App\Http\Controllers\PerteController@recherche')
    ->name('perte.rech');
Route::post('/pertes/recherche', 'App\Http\Controllers\PerteController@recherche');
Route::resource('pertes', App\Http\Controllers\PerteController::class);
/**
 * categories.
 */
Route::get('/categories', 'App\Http\Controllers\CategorieController@index');
Route::resource('categories', App\Http\Controllers\CategorieController::class);
/**
 * annees.
 */
// Route::get('/annees/date', 'App\Http\Controllers\AnneeController@date');
// Route::get('/annees/store/{id}', 'App\Http\Controllers\AnneeController@store')->name('datean');
Route::resource('annees', App\Http\Controllers\AnneeController::class);
/**
 * stocks.
 */
Route::get('/stocks/recherche', 'App\Http\Controllers\StockController@recherche')
    ->name('stock.rech');
Route::post('/stocks/recherche', 'App\Http\Controllers\StockController@recherche');
Route::resource('stocks', App\Http\Controllers\StockController::class);
/**
 * accueil.
 */
Route::get('/accueils/recherche', 'App\Http\Controllers\AccueilController@recherche')
    ->name('accueil.rech');
Route::post('/accueils/recherche', 'App\Http\Controllers\AccueilController@recherche');
Route::resource('accueils', App\Http\Controllers\AccueilController::class);


Route::resource('articles', App\Http\Controllers\ArticleController::class);
Route::resource('agents', App\Http\Controllers\AgentController::class);
Route::resource('fournisseurs', App\Http\Controllers\FournisseurController::class);
Route::resource('layouts', App\Http\Controllers\LayoutController::class);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
