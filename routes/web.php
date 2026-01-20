<?php

use App\Http\Controllers\AspirationController;
use App\Http\Controllers\AspirationFeedbackController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------
| Rute untuk guest
|---------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {

    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::get('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/login', [LoginController::class, 'check_login'])
        ->name('login.check_login');

    Route::get('/register', [RegisterController::class, 'index'])
        ->name('register');

    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');
});

/*
|---------------------------------------------------------------
| Rute logout
|---------------------------------------------------------------
*/

Route::post("/logout", [LoginController::class, "logout"])
    ->middleware('auth')
    ->name('logout');

/*
|---------------------------------------------------------------
| Rute Authenticated (sudah dalam keadaan login)
|---------------------------------------------------------------
*/ 

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.index');

    // Aspirations (student & admin)
    Route::resource('aspirations', AspirationController::class);

    // Feedback (admin)
    Route::post(
        'aspirations/{aspiration}/feedback',
        [AspirationFeedbackController::class, 'store']
    )->name('aspirations.feedback');

});

/*
|---------------------------------------------------------------
| Admin Only
|---------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('categories', CategoryController::class);

});