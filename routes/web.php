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

Route::post('register', [RegisterController::class, 'register'])->name('user.register');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('home', [HomeController::class, 'index'])->name('user.home');


Route::prefix('contact/')->group(function () {
   Route::get('list', [ContactController::class, 'index'])->name('contact.list');
   Route::get( 'create', [ContactController::class,'create'])->name('contact.create');
   Route::post('store', [ContactController::class,'store'])->name('contact.store');
   Route::get('edit/{id}', [ContactController::class,'edit'])->name('contact.edit');
   Route::post('update/{id}', [ContactController::class,'update'])->name('contact.update');
   Route::get('destroy/{id}', [ContactController::class,'destroy'])->name('contact.destroy');
   Route::get('show/{id}', [ContactController::class,'show'])->name('contact.show');
});
