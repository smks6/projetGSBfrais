<?php
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
