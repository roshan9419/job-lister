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

Route::get('/', [Controllers\HomeController::class, 'index']);

// Auth routes
Route::get('/auth/login', [Controllers\AuthController::class, 'googleLogin'])->name('auth.login');

Route::get('/auth/logout', [Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::get('/auth/google/callback', [Controllers\AuthController::class, 'googleCallback']);

// Restiration routes
Route::middleware('auth')->prefix('/register')->group(function () {
    Route::get('/', [Controllers\RegisterController::class, 'index'])->middleware(['company', 'candidate']);

    Route::middleware('company')->group(function () {
        Route::get('/company', [Controllers\CompanyController::class, 'form']);
        Route::post('/company', [Controllers\CompanyController::class, 'register'])->name('company.register');
    });

    Route::middleware('candidate')->group(function () {
        Route::get('/candidate', [Controllers\CandidateController::class, 'form']);
        Route::post('/candidate', [Controllers\CandidateController::class, 'register'])->name('candidate.register');
    });
});


// Company related routes
Route::get('/company/dashboard', [Controllers\CompanyController::class, 'dashboard'])->name('company.dashboard');
Route::get('/companies', [Controllers\HomeController::class, 'listCompanies'])->name('companies.list');
Route::get('/company/{name_slug}/profile', [Controllers\HomeController::class, 'companyProfile'])->name('company.profile');

// Jobs related routes
Route::get('/job/{job_id}/{slug}', [Controllers\JobController::class, 'viewJobPost'])->name('job.view');
Route::post('/job/create', [Controllers\JobController::class, 'createJobPost'])->name('job.create');
Route::put('/job/{job_id}/close', [Controllers\JobController::class, 'closeJob'])->name('job.close');

// Jobs searching and filtering
Route::get('/jobs', [Controllers\JobController::class, 'listJobs'])->name('jobs.list');
Route::get('/jobs/search', [Controllers\JobController::class, 'searchJobs'])->name('jobs.search');


//TODO: add middlewares