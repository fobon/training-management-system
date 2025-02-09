<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NormalhomeController;
use App\Http\Controllers\NormaldashboardController;
use App\Http\Controllers\NormalmanualbookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ManualbookController;
use App\Http\Controllers\RickAndMortyController;

// Redirect to login
Route::get('/', function () {
    return redirect()->route('login');
})->name('home.redirect');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Home and dashboard route
Route::middleware(['auth'])->group(function() {
Route::get('/home', function() { return view('/home'); })->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Banner routes
Route::middleware(['auth'])->group(function() {
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
});

// Company routes
Route::middleware(['auth'])->group(function(){
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
});

// Manualbook routes
Route::middleware(['auth'])->group(function(){
    Route::get('/manualbooks', [ManualbookController::class, 'index'])->name('manualbooks.index');
    Route::get('/manualbooks/create', [ManualbookController::class, 'create'])->name('manualbooks.create');
    Route::post('/manualbooks', [ManualbookController::class, 'store'])->name('manualbooks.store');
    Route::get('/manualbooks/{manualbook}/details', [ManualbookController::class, 'details'])->name('manualbooks.details');
    Route::get('/manualbooks/{manualbook}/edit', [ManualbookController::class, 'edit'])->name('manualbooks.edit');
    Route::put('/manualbooks/{manualbook}', [ManualbookController::class, 'update'])->name('manualbooks.update');
    Route::delete('/manualbooks/{manualbook}', [ManualbookController::class, 'destroy'])->name('manualbooks.destroy');
});

// Route::get('/normalhome', function() { return view('/normalhome'); })->name('normalhome');
Route::middleware(['auth', 'normal.user'])->group(function () {
Route::get('/normalhome', [NormalhomeController::class, 'index'])->name('normalhome');
Route::get('/normaldashboard', [NormaldashboardController::class, 'index'])->name('normaldashboard');
Route::get('/normalmanualbook', [NormalmanualbookController::class, 'index'])->name('normalmanualbook');
});

// Resource routes for users
Route::resource('/users', UserController::class);

// Additional routes
Route::get('/frontendtest', function () { return view('frontendtest'); });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// API
Route::get('/rickandmorty', [RickAndMortyController::class, 'index'])->name('rickandmorty');
