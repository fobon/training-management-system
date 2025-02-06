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
Route::get('/home', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\UserController;
Route::resource('/home/users', UserController::class);

use App\Http\Controllers\DashboardController;
Route::get('home/dashboard', [DashboardController::class, 'index'])->name('dashboard');


use App\Http\Controllers\BannerController;
Route::middleware(['auth'])->group(function() {
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/frontendtest', function () {
    return view('frontendtest');
});

Route::get('/home/users/index', function () {
    return view('index');
});

Route::get('/home/users/index/create', function () {
    return view('create');
});

Route::get('/home/users/index/edit', function () {
    return view('edit');
});
