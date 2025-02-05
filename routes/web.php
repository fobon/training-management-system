<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\UserController;
Route::resource('/home/users', UserController::class);

use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
    return view('welcome', ['title' => 'Home']);
})->name('welcome');

Route::get('/home', function () {
    return view('home');
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



// Route::get('login', [UserController::class, 'login'])->name('login');
// Route::post('login', [UserController::class, 'login_action'])->name('login.action');
// Route::get('password', [UserController::class, 'password'])->name('password');
// Route::post('password', [UserController::class, 'password_action'])->name('password.action');
// Route::get('logout', [UserController::class, 'logout'])->name('logout');
