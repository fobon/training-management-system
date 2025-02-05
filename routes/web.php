<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/home/index', function () {
    return view('index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/index/create', function () {
    return view('create');
});

Route::get('/home/index/edit', function () {
    return view('edit');
});

Route::resource('users', UserController::class);
