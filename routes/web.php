<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Middleware\LoginAuth;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('masuk');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([LoginAuth::class . ':admin'])->group(function () {

//ADMIN
Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');

});

Route::middleware([LoginAuth::class . ':pemilih'])->group(function () {

//PEMILIH
Route::get('/pemilih', [PagesController::class, 'pemilih'])->name('pemilih');

});


