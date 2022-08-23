<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ParserController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::get('/demo', function(){
    $user = User::where('email', 'demo@mail.com')->first();
    Auth::attempt(['email' => 'demo@mail.com', 'password' => 'password']);
    return redirect(route('account', ['name' => $user->name]));
})->name('demoAccount');

Route::get('register', function () {
    return view('register');
});

Route::post('register', [RegisterController::class, 'register'])->name('registerForm');

Route::get('signin', function () {
    return view('signin');
});

Route::post('signin', [AccessController::class, 'signin'])->name('signinForm');

Route::middleware(Authenticate::class)->group(function() {
    Route::get('account/{name}', function ($name) {
        return view('personalPage', ['name' => $name]);
    })->name('account');

    Route::get('exit', [AccessController::class, 'exit'])->name('exit');

    Route::post('account/', [ParserController::class, 'parsing'])->name('parser');

    Route::any('confirm/{match}', function($match) {
        return view('confirmMatch', ['match' => $match]);
    })->name('confirm');

    Route::get('success/{match}', [ParserController::class, 'success'])->name('success');

    Route::get('list', [AccountController::class, 'list'])->name('list');

    Route::get('monitoring/{idSourceData}',[AccountController::class, 'monitoring'])->name('monitoring');

    Route::get('delete/{idSourceData}',[AccountController::class, 'delete'])->name('deleteSourceData');

    Route::any('update/{idSourceData}', [AccountController::class, 'update'])->name('update');

    Route::get('addImage/{idSourceData}', function ($idSourceData) {
        return view('addImage', ['idSourceData' => $idSourceData]);
    })->name('addImageGet');

    Route::post('addImage/{idSourceData}', [AccountController::class, 'addImage'])->name('addImagePost');
});

Route::get('test', [\App\Http\Controllers\TestController::class, 'test']);
