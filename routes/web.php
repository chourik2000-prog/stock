<?php
use App\Models\Agent;
use App\Models\Approvisionnement;
use App\Models\Demande;
use App\Models\Article;
use App\Models\Annee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoController;

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
        Route::get('msg', 'MsgController@msg');

        //   bilans.
         
        Route::get('/bilans', 'BilanController@index');
        Route::get('/bilans/store/{id_article}', 'BilanController@store')->name('bilanChart');
        Route::get('/bilans/recherche', 'BilanController@recherche')->name('rechercheform');
        Route::post('/bilans/recherche', 'BilanController@recherche');

        /**
         * approv.
         */
        Route::get('/pdfappro/recherche', 'PdfapprovController@index')->name('provi.pdf');
        Route::post('/pdfappro/pdf', 'PdfapprovController@index');

        Route::get('/approvisionnements/recherche', 'ApprovisionnementController@recherche')->name('approv.rech');
        Route::post('/approvisionnements/recherche', 'ApprovisionnementController@recherche');
        Route::resource('approvisionnements', ApprovisionnementController::class);
        /**
         * commandes.
         */

        Route::get('/commandes/recherche', 'CommandeController@recherche')->name('comm.rech');
        Route::post('/commandes/recherche', 'CommandeController@recherche');
        Route::get('/commandes/pdf', 'CommandeController@pdf')->name('comm.pdf');
        Route::resource('commandes', CommandeController::class);

        /**
         * demandes.
         */

        Route::get('/demandes/recherche', 'DemandeController@recherche')->name('demande.rech');
        Route::post('/demandes/recherche', 'DemandeController@recherche');
        Route::get('/demandes/pdf', 'DemandeController@pdf')->name('dem.pdf');
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
        
        // les statistiques par agent (en commentaire dans sidebar)
        // Route::get('/conso_agents/recherche', 'ConsoAgentController@recherche')->name('consoagent.rech');
        // Route::post('/conso_agents/recherche', 'ConsoAgentController@recherche');
        
        // pdf du statistique par agent
        Route::get('/conso_agents/pdf', 'PdfAgentController@index')->name('consoAgent.pdf');
        Route::post('/conso_agents/recherche', 'PdfAgentController@index');

        // les statistiques par catégorie
        // Route::get('/conso_categories/recherche', 'ConsoCategorieController@recherche')->name('consocategorie.rech');
        // Route::post('/conso_categories/recherche', 'ConsoCategorieController@recherche');

        // pdf du statistique par catégorie
        Route::get('/conso_categories/pdf', 'PdfCategorieController@index')->name('consoCategorie.pdf');
        Route::post('/conso_categories/recherche', 'PdfCategorieController@index');

            /**
         * categories.
         */
        // Route::get('/categories', 'CategoController@index');
        // Route::resource('categories', CategoController::class);
        

        Route::resource('articles', ArticleController::class);
        Route::resource('agents', AgentController::class);
        Route::resource('fournisseurs', FournisseurController::class);
        Route::resource('users', UserController::class);
        
    });   
});
Route::resource('categos',CategoController::class);