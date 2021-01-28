<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\BonController;
use App\Http\Controllers\StockController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/dashboard/admin',function(){
//     return view('layouts.admin');
// })->middleware(['auth']);

Route::get('/dashboard/admin/produits',[ProduitController::class, 'index'])->name('mes_produits')->middleware(['auth']);
Route::get('/dashboard/admin/nouveau_Produit',[ProduitController::class, 'create'])->name('nouveau_produit')->middleware(['auth']);
Route::get('/dashboard/admin/nouvelle_Arrivage',[ProduitController::class, 'nouvelleArrivage'])->name('nouvelleArrivage')->middleware(['auth']);
Route::get('/dashboard/admin/produit_renouveler',[ProduitController::class, 'produitRenouveler'])->name('produitRenouveler')->middleware(['auth']);
Route::get('/dashboard/admin/produit_manquants',[ProduitController::class, 'produitManquant'])->name('produitManquant')->middleware(['auth']);
Route::get('/dashboard/admin/produits/editer',[ProduitController::class, 'edit'])->name('produitEdit')->middleware(['auth']);


Route::get('/dashboard/admin/factures',[FactureController::class, 'index'])->name('mes_factures')->middleware(['auth']);
Route::get('/dashboard/admin/nouvelle_factures',[FactureController::class, 'create'])->name('nouvelle_facture')->middleware(['auth']);
Route::get('/dashboard/admin/editer_factures',[FactureController::class, 'edit'])->name('editer_factures')->middleware(['auth']);


Route::get('/dashboard/admin/bons',[BonController::class, 'index'])->name('mes_bons')->middleware(['auth']);
Route::get('/dashboard/admin/nouveau_bon',[BonController::class, 'create'])->name('nouveau_bons')->middleware(['auth']);
Route::get('/dashboard/admin/editer_Bon',[BonController::class, 'edit'])->name('editer_bons')->middleware(['auth']);


Route::post('dashoard/admin/produit/create',[ProduitController::class, 'store'])->name('Create_Produit')->middleware(['auth']);


Route::get('dashoard/admin/produit/search',[ProduitController::class, 'search'])->name('search_Produit')->middleware(['auth']);
Route::get('dashoard/admin/produit/destroy',[ProduitController::class, 'destroy'])->name('supprimer_produit')->middleware(['auth']);
Route::post('dashoard/admin/produit/edit',[ProduitController::class, 'update'])->name('update_Prod')->middleware(['auth']);

Route::post('dashoard/admin/facture/create',[FactureController::class, 'store'])->name('create_Facture')->middleware(['auth']);
Route::post('dashoard/admin/nouvellestock',[StockController::class, 'store'])->name('ProduitEntrer')->middleware(['auth']);

Route::get('dashoard/admin/search',[FactureController::class, 'search'])->name('search_Facture')->middleware(['auth']);
Route::post('dashoard/admin/facture/edit',[FactureController::class, 'update'])->name('edit_Facture')->middleware(['auth']);
Route::get('dashoard/admin/facture/destroy',[FactureController::class, 'destroy'])->name('supprimer_facture')->middleware(['auth']);

Route::post('dashoard/admin/facture/QuickStore',[FactureController::class, 'Qstore'])->name('QuickAdd')->middleware(['auth']);
Route::get('dashoard/admin/facture/details/{id}',[FactureController::class, 'show'])->name('factureDetails')->middleware(['auth']);


Route::post('dashoard/admin/bon/create',[BonController::class, 'store'])->name('createBon')->middleware(['auth']);
Route::get('dashoard/admin/bon/produit',[BonController::class, 'storeProd'])->name('add_Prod_Bon')->middleware(['auth']);
Route::get('dashoard/admin/bon/produit/search',[BonController::class, 'search'])->name('searchBon')->middleware(['auth']);
Route::get('dashoard/admin/bon/search',[BonController::class, 'searchForEdit'])->name('searchBonForEdit')->middleware(['auth']);
Route::get('dashoard/admin/bon/produit/supprimer',[BonController::class, 'deleteProdBon'])->name('deleteProdBon')->middleware(['auth']);
