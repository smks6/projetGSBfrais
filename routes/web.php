<?php
use App\Http\Controllers\VisiteurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/authentifier', [VisiteurController::class, 'auth']);
Route::get('/connecter', [VisiteurController::class, 'login']);
