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

// Auth routes
Route::get('/auth/login', [Controllers\AuthController::class, 'googleLogin'])->name('auth.login');

Route::get('/auth/logout', [Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::get('/auth/google/callback', [Controllers\AuthController::class, 'googleCallback']);

// Restiration routes
Route::prefix('/register')->group(function () {
    Route::get('/', [Controllers\RegisterController::class, 'index']);
    
    Route::get('/company', [Controllers\CompanyController::class, 'form']);
    Route::post('/company', [Controllers\CompanyController::class, 'register'])->name('company.register');
    
    Route::get('/candidate', [Controllers\CandidateController::class, 'form']);
    Route::post('/candidate', [Controllers\CandidateController::class, 'register'])->name('candidate.register');
});

// Company related routes
Route::get('/company/dashboard', [Controllers\CompanyController::class, 'dashboard'])->name('company.dashboard');
Route::get('/companies', [Controllers\HomeController::class, 'listCompanies'])->name('companies.list');

// Jobs related routes
Route::get('/job/{job_id}/{slug}', [Controllers\JobController::class, 'viewJobPost'])->name('job.view');
Route::post('/job', [Controllers\JobController::class, 'createJobPost'])->name('job.create');
Route::get('/jobs', [Controllers\JobController::class, 'listJobs']);


//TODO: add middlewares