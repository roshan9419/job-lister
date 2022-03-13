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
    return view('home.index');
});

Route::get('/auth/login', [Controllers\AuthController::class, 'googleLogin'])->name('auth.login');

Route::get('/auth/logout', [Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::get('/auth/google/callback', [Controllers\AuthController::class, 'googleCallback']);


Route::prefix('/register')->group(function () {
    Route::get('/', [Controllers\RegisterController::class, 'index']);
    
    Route::get('/company', [Controllers\CompanyController::class, 'form']);
    Route::post('/company', [Controllers\CompanyController::class, 'register'])->name('company.register');
    
    Route::get('/candidate', [Controllers\CandidateController::class, 'form']);
    Route::post('/candidate', [Controllers\CandidateController::class, 'register']);
});

// Company related routes
Route::get('/company/dashboard', [Controllers\CompanyController::class, 'dashboard'])->name('company.dashboard');
// Route::prefix('/company/{name_slug}')->group(function () {
    // Route::get('/dashboard', [Controllers\CompanyController::class, 'dashboard']);
// });

// Jobs related routes
Route::get('jobs', [Controllers\JobController::class, 'listJobs']);
Route::post('createJob', [Controllers\JobController::class, 'createJobPost']);

Route::get('companies', [Controllers\HomeController::class, 'listCompanies']);

//TODO: add middlewares