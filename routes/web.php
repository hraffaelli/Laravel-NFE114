<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\Auth\PasswordController;

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

    Route::get('/profile/list', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::delete('/profile/delete/{post}', [ProfileController::class, 'delete'])->name('profile.delete');
    Route::get('/profile/edit/{post}', [ProfileController::class, 'editById'])->name('profile.edit-multi');
    Route::put('/profile/update/{post}', [ProfileController::class, 'updateById'])->name('profile.update-multi');
    Route::delete('/profile/destroy/{post}', [ProfileController::class, 'destroyById'])->name('profile.destroy');
    Route::put('/profile/edit/password/{post}', [PasswordController::class, 'updateById'])->name('password.updateById');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/seances/participant/add/{post}', [SeanceController::class, 'addParticipant'])->name('seances.addParticipant');
    Route::get('/seances/participant/delete/{post}', [SeanceController::class, 'deleteParticipant'])->name('seances.deleteParticipant');

    Route::get('/seances', SeanceController::class . '@index')->name('seances.index');
    Route::get('/seances/create', SeanceController::class . '@create')->name('seances.create');
    Route::post('/seances', SeanceController::class . '@store')->name('seances.store');
    Route::get('/seances/{post}', SeanceController::class . '@show')->name('seances.show');
    Route::get('/seances/edit/{post}', SeanceController::class . '@edit')->name('seances.edit');
    Route::put('/seances/{post}', SeanceController::class . '@update')->name('seances.update');
    Route::delete('/seances/{post}', SeanceController::class . '@destroy')->name('seances.destroy');
});

require __DIR__ . '/auth.php';
