<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenguntilanController;
use App\Http\Controllers\PemanenanController;
use App\Http\Controllers\PemupukanController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\DashboardController;


// Auth
Route::get('/signin', [AuthController::class, 'view_signin'])
    ->middleware(['guest'])
    ->name('signin');
Route::post('/signin', [AuthController::class, 'action_signin']);

Route::get('/signup', [AuthController::class, 'view_signup'])
    ->middleware(['guest'])
    ->name('signup');
Route::post('/signup', [AuthController::class, 'action_signup']);

Route::get('/profile', [AuthController::class, 'view_profile']);
Route::put('/profile', [AuthController::class, 'action_edit']);

Route::post('/signout', [authController::class, 'action_signout']);

// Dashboard
Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['admin'])
    ->name('dashboard');

// PENGUNTILAN
Route::get('/penguntilan', [PenguntilanController::class, 'index'])
    ->middleware(['assistant'])
    ->name('penguntilan');
Route::post('/penguntilan', [PenguntilanController::class, 'action_addPenguntilan']);
Route::put('/penguntilan/{id}', [PenguntilanController::class, 'action_edit']);
Route::delete('/penguntilan/{id}', [PenguntilanController::class, 'destroy']);

// PEMUMUKAN
Route::get('/pemupukan', [PemupukanController::class, 'index'])
    ->middleware(['assistant'])
    ->name('pemupukan');
Route::post('/pemupukan', [PemupukanController::class, 'action_addPemupukan']);
Route::put('/pemupukan/{id}', [PemupukanController::class, 'action_edit']);
Route::delete('/pemupukan/{id}', [PemupukanController::class, 'destroy']);

// PEMANENAN
Route::get('/pemanenan', [PemanenanController::class, 'index'])
    ->middleware(['assistant'])
    ->name('pemanenan');
Route::post('/pemanenan', [PemanenanController::class, 'action_addPemanenan']);
Route::put('/pemanenan/{id}', [PemanenanController::class, 'action_edit']);
Route::delete('/pemanenan/{id}', [PemanenanController::class, 'destroy']);

// PERAWATAN
Route::get('/perawatan', [PerawatanController::class, 'index'])
    ->middleware(['assistant'])
    ->name('perawatan');
Route::post('/perawatan', [PerawatanController::class, 'action_addPerawatan']);
Route::put('/perawatan/{id}', [PerawatanController::class, 'action_edit']);
Route::delete('/perawatan/{id}', [PerawatanController::class, 'destroy']);


