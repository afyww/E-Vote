<?php

use App\Models\User;
use App\Http\Middleware\LoginAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\SuaraController;
use App\Models\Calon;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('masuk');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([LoginAuth::class . ':admin'])->group(function () {

    //ADMIN
    
    //PAGES
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/user', [PagesController::class, 'user'])->name('user');
    Route::get('/search', [PagesController::class, 'search'])->name('search');

    //PEMILIH

    Route::get('/pemilih', [PemilihController::class, 'index'])->name('pemilih');
    Route::get('/addpemilih', [PemilihController::class, 'create'])->name('addpemilih');
    Route::post('/createpemilih', [PemilihController::class, 'store'])->name('createpemilih');
    Route::delete('/destroypemilih/{id}', [PemilihController::class, 'destroy'])->name('destroypemilih');

    //CALON
    Route::get('/calon', [CalonController::class, 'index'])->name('calon');
    Route::get('/addcalon', [CalonController::class, 'create'])->name('addcalon');
    Route::post('/createcalon', [CalonController::class, 'store'])->name('createcalon');
    Route::get('/editcalon/{id}', [CalonController::class, 'edit'])->name('editcalon');
    Route::put('/updatecalon/{id}', [CalonController::class, 'update'])->name('updatecalon');
    Route::delete('/destroycalon/{id}', [CalonController::class, 'destroy'])->name('destroycalon');

    //SUARA
    Route::get('/suara', [SuaraController::class, 'index'])->name('suara');
    Route::get('/addsuara', [SuaraController::class, 'create'])->name('addsuara');
    Route::post('/createsuara', [SuaraController::class, 'store'])->name('createsuara');

});

Route::middleware([LoginAuth::class . ':pemilih'])->group(function () {

    //PEMILIH
    Route::get('/e-voting', [PagesController::class, 'dashboarduser'])->name('dashboarduser');
});
