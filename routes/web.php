<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/', function () {
    return view('home');
});


Route::get('/auth/google', [Controllers\AuthController::class, 'googleLogin'])
    ->name('login.google');

Route::get('/auth/google/callback', [Controllers\AuthController::class, 'googleCallback']);


Route::prefix('/register')->group(function () {
    Route::get('/', [Controllers\RegisterController::class, 'index']);
    
    Route::get('/company', [Controllers\RegisterController::class, 'company']);
    Route::post('/company', [Controllers\RegisterController::class, 'registerCompany']);
    
    Route::get('/candidate', [Controllers\RegisterController::class, 'candidate']);
    Route::post('/candidate', [Controllers\RegisterController::class, 'registerCandidate']);
});


// Company related routes
Route::prefix('/company/{name_slug}')->group(function () {
    Route::get('/dashboard', [Controllers\CompanyController::class, 'dashboard']);
});

// Route::get('companies', [Controllers\CompanyController::class, 'index']);

//TODO: add middlewares