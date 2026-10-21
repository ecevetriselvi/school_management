<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/store', [HomeController::class, 'store'])
    ->name('store');

Route::get('/fetch', [HomeController::class, 'fetch'])
    ->name('fetch');

Route::get('/delete', [HomeController::class, 'delete'])
    ->name('delete');

Route::get('/logout', [HomeController::class, 'logout'])
    ->name('logout');

Route::get('/{id}', [HomeController::class, 'show'])
    ->name('show');