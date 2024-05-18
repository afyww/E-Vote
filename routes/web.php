<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;

Route::get('/', [AuthController::class, 'login'])->name('login');

//ADMIN
Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');

//PEMILIH
Route::get('/pemilih', [PagesController::class, 'pemilih'])->name('pemilih');

