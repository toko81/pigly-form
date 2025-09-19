<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


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

Route::middleware('auth')->group(function () {
    Route::get('/weight_logs/index', [RegisterController::class, 'index']);
    Route::get('/weight_logs/create', [RegisterController::class, 'create']);
    Route::get('/weight_logs/search', [RegisterController::class, 'search']);
    Route::get('/weight_logs/edit', [RegisterController::class, 'edit']);
    Route::post('/weight_logs/show', [RegisterController::class, 'show']);
    Route::post('/weight_logs/delete', [RegisterController::class, 'destroy']);
});

Route::get('/register/step1', [RegisterController::class, 'index']);
Route::post('/register/step1', [RegisterController::class, 'step1Store'])->name('register.step1.store');

Route::get('/register/step2', [RegisterController::class, 'step2'])->name('register.step2');
Route::post('/register/step2', [RegisterController::class, 'step2Store'])->name('register.step2.store');

Route::get('/auth/login', [RegisterController::class, 'showLoginForm'])->name('login');
Route::post('/login', [RegisterController::class, 'login'])->name('login.custom');

