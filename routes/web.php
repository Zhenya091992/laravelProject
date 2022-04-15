<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

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
})->name('/');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [
    RegisterController::class,
    'register'
])->name('registerForm');

Route::get('/signin', function () {
    return view('signin');
});

Route::post('/signin', [
    AccessController::class,
    'signin'
])->name('signinForm');

Route::middleware(Authenticate::class)->group(function() {
    Route::get('/account/{name}', function ($name) {
        return view('personalPage', ['name' => $name]);
    })->name('account');

    Route::get('/exit', [
        AccessController::class,
        'exit'
    ])->name('exit');
});

