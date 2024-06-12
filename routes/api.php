<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApprovisionnementsController;
use App\Http\Controllers\API\ProduitsController;
use App\Http\Controllers\API\FournisseursController;
use App\Http\Controllers\API\ProductionsController;
use App\Http\Controllers\API\ProduitCommandeController;
use App\Http\Controllers\API\DistributeursController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\FournisseurMatController;
use App\Http\Controllers\API\MatierePremieresController;
use App\Http\Controllers\API\CommandesController;
use App\Http\Controllers\API\ClientsController;
use App\Http\Controllers\API\MatiereProduitsController;

/*

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('approvisionnements', ApprovisionnementsController::class);
Route::apiResource('produits', ProduitsController::class);
Route::apiResource('fournisseurs', FournisseursController::class);
Route::apiResource('productions', ProductionsController::class);
Route::apiResource('produitcommandes', ProduitCommandeController::class);
Route::apiResource('distributeurs', DistributeursController::class);
Route::apiResource('categories', CategoriesController::class);
Route::apiResource('fournisseurmat', FournisseurMatController::class);
Route::apiResource('matierepremieres', MatierePremieresController::class);
Route::apiResource('Commandes', CommandesController::class);
Route::apiResource('Clients', ClientsController::class);
Route::apiResource('matiereproduits', MatiereProduitsController::class);
