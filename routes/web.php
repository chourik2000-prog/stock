<?php
use App\Models\Agent;
use App\Models\Approvisionnement;
use App\Models\Demande;
use App\Models\Article;
use App\Models\Annee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


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


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);


Route::group(['namespace' => 'App\Http\Controllers'], function()
{ 
  
    Route::group(['middleware' => ['auth','role']], function() {

        Route::get('/logout', 'Auth\LogoutController@logout')->name('auth.logout');
       
        Route::get('home', 'GestaccueilController@index')->name('home');

        // header 
        // Route::get('deskapp/header', 'helpers@index');
        /**
         * bilans.
         */
        Route::get('/bilans', 'BilanController@index');
        Route::get('/bilans/store/{id_article}', 'BilanController@store')->name('bilanChart');
        Route::get('/bilans/recherche', 'BilanController@recherche')->name('rechercheform');
        Route::post('/bilans/recherche', 'BilanController@recherche');

        /**
         * approv.
         */

        Route::get('/approvisionnements/recherche', 'ApprovisionnementController@recherche')->name('approv.rech');
        Route::post('/approvisionnements/recherche', 'ApprovisionnementController@recherche');
        Route::resource('approvisionnements', ApprovisionnementController::class);

        /**
         * commandes.
         */

        Route::get('/commandes/recherche', 'CommandeController@recherche')->name('comm.rech');
        Route::post('/commandes/recherche', 'CommandeController@recherche');
        Route::resource('commandes', CommandeController::class);

        /**
         * commandes.
         */

        Route::get('/demandes/recherche', 'DemandeController@recherche')->name('demande.rech');
        Route::post('/demandes/recherche', 'DemandeController@recherche');
        Route::resource('demandes', DemandeController::class);

        /**
         * pertes.
         */

        Route::get('/pertes/recherche', 'PerteController@recherche')->name('perte.rech');
        Route::post('/pertes/recherche', 'PerteController@recherche');
        Route::resource('pertes', PerteController::class);

        /**
         * annees.
         */

        Route::resource('annees', AnneeController::class);

        /**
         * stocks.
         */

        Route::get('/stocks/recherche', 'StockController@recherche')->name('stock.rech');
        Route::post('/stocks/recherche', 'StockController@recherche');
        Route::resource('stocks', StockController::class);
        /**
         * accueil.
         */
        Route::get('/pdfs/pdf', 'PdfController@index')->name('pdfs.pdf');
        Route::post('/pdfs/recherche', 'PdfController@index');
    
        Route::get('/accueils/recherche', 'AccueilController@recherche')->name('accueil.rech');
        Route::post('/accueils/recherche', 'AccueilController@recherche');
        
        // Route::resource('layouts', LayoutController::class);

                /**
             * categories.
             */
            Route::get('/categories', 'CategorieController@index');
            Route::resource('categories', CategorieController::class);

            Route::resource('articles', ArticleController::class);
            Route::resource('agents', AgentController::class);
            Route::resource('fournisseurs', FournisseurController::class);
            Route::resource('users', UserController::class);
        
    });   
});