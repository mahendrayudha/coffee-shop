<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/registration', [AuthController::class, 'registration'])->name('registration')->middleware('guest');
Route::post('/registration', [AuthController::class, 'store'])->name('registration.store');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home-auth');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

