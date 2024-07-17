<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("accueil");

/*Route::get('/etudiant', function () {
    return view('etudiant');
}); **/

Route::get('/etudiant', [EtudiantController::class, "index"])->name("etudiant");

//route pour ajouter etudiant
Route::post('/etudiant/create', [EtudiantController::class, "ajouter"])->name("etudiant.ajouter");
Route::get('/etudiant/create', [EtudiantController::class, "create"])->name("etudiant.create");

//route pour supprimer etudiant
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, "supprimer"])->name("etudiant.supprimer");

//route pour modifier etudiant
Route::put('/etudiant/{etudiant}', [EtudiantController::class, "modifier"])->name("etudiant.modifier");
Route::get('/etudiant/{etudiant}', [EtudiantController::class, "edit"])->name("etudiant.edit");