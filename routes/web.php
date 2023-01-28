<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/regis', [AuthController::class, 'register'])->name('register');
Route::post('/post-regis', [AuthController::class, 'postRegister'])->name('postRegister');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [AuthController::class, 'dashboard']); 