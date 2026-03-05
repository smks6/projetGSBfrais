<?php

use App\Http\Controllers\FraisHFController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\VisiteurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FraisController;
Route::get('/', function () {return view('home');});
Route::post('/authentifier', [VisiteurController::class, 'auth']);
Route::get('/connecter', [VisiteurController::class, 'login']);
Route::get('/deconnecter', [VisiteurController::class, 'logout']);
Route::get('/listerFrais', [FraisController::class, 'listFrais']);
Route::get('/ajouterFrais', [FraisController::class, 'addFrais']);
Route::post('/validerFrais', [FraisController::class, 'validFrais']);
Route::get('/editerFrais/{id}', [FraisController::class, 'editFrais']);
Route::get('/supprimerFrais/{id}', [FraisController::class, 'removeFrais']);


Route::get('/listerFraisHF/{id}', [FraisHFController::class, 'listFraisHF']);
Route::get('/ajouterFraisHF', [FraisHFController::class, 'addFraisHF'])->name('addFraisHF');
Route::post('/validerFraisHF', [FraisHFController::class, 'validFraisHF']);

Route::get('/listMedicaments', [MedicamentController::class, 'listMed']);
Route::get('/searchMed', [FraisController::class, 'searchMed']);
