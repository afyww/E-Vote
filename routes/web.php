<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
