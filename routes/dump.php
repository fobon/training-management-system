<?php

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

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\HomeController;
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', function()
{
    if  (auth()->user()->role == 'Admin'){
        return view('/home');
    } else
    {
        return redirect()->route('normalhome');
    }
})->name('home');

Route::middleware(['role:Normal user'])->group(function() {
    Route::get('/normalhome', [NormalhomeController::class, 'normalhome'])->name('normalhome');
    Route::get('/normaldashboard', [NormaldashboardController::class, 'index'])->name('normaldashboards.index');
    Route::get('/normalmanualbooks', [NormalmanualbookController::class], 'index')->name('normalmanualbooks.index');
});

use App\Http\Controllers\UserController;
Route::resource('/users', UserController::class);

use App\Http\Controllers\DashboardController;
Route::get('/home/dashboard', [DashboardController::class, 'index'])->name('dashboard');


use App\Http\Controllers\BannerController;
Route::middleware(['auth'])->group(function() {
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
});

use App\Http\Controllers\CompanyController;
// Route::resource('companies', CompanyController::Class);
Route::middleware(['auth'])->group(function(){
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
});

use App\Http\Controllers\ManualBookController;
// Route::resource('/home/manualbooks', ManualbookController::class);
Route::middleware(['auth'])->group(function(){
    Route::get('/manualbooks', [ManualbookController::class, 'index'])->name('manualbooks.index');
    Route::get('/manualbooks/create', [ManualbookController::class, 'create'])->name('manualbooks.create');
    Route::post('/manualbooks', [ManualbookController::class, 'store'])->name('manualbooks.store');
    Route::get('/manualbooks/{manualbook}/details', [ManualbookController::class, 'details'])->name('manualbooks.details');
    Route::get('/manualbooks/{manualbook}/edit', [ManualbookController::class, 'edit'])->name('manualbooks.edit');
    Route::put('/manualbooks/{manualbook}', [ManualbookController::class, 'update'])->name('manualbooks.update');
    Route::delete('/manualbooks/{manualbook}', [ManualbookController::class, 'destroy'])->name('manualbooks.destroy');
});

Route::get('/home', function () {return view('home'); });
Route::get('/home/users/index', function () { return view('users.index'); });
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::get('/frontendtest', function () { return view('frontendtest'); });


