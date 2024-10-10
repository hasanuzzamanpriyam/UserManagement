<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('home', [HomeController::class, 'index']);


Route::prefix('contact/')->group(function () {
   Route::get('list', [ContactController::class, 'index']);
   Route::get( 'create', [ContactController::class,'create']);
   Route::post('store', [ContactController::class,'store']);
   Route::get('edit/{id}', [ContactController::class,'edit']);
   Route::post('update/{id}', [ContactController::class,'update']);
   Route::get('destroy/{id}', [ContactController::class,'destroy']);
   Route::get('show/{id}', [ContactController::class,'show']);
});
