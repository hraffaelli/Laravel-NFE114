<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RameurController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/rameur',[RameurController::class,'liste_rameur']);
Route::get('/ajouter',[RameurController::class,'ajouter_rameur']);
Route::get('/ajouter/traitement',[RameurController::class,'ajouter_rameur_traitement']);
Route::get('/modifier/{id}',[RameurController::class,'modifier_rameur']);
Route::get('/modifier-traitement',[RameurController::class,'modifier_rameur_traitement']);
Route::get('/supprimer/{id}',[RameurController::class,'supprimer_rameur']);


Route::get('/session',[SessionController::class,'liste_session']);
Route::get('/ajouter-session',[SessionController::class,'ajouter_session']);
Route::get('/ajouter-session/traitement',[SessionController::class,'ajouter_session_traitement']);
Route::get('/modifier-session/{id}',[SessionController::class,'modifier_session']);
Route::get('/modifier-session-traitement',[SessionController::class,'modifier_session_traitement']);
Route::delete('/supprimer-session/{id}',[SessionController::class,'supprimer_session']);


