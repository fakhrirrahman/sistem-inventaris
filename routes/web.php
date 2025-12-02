<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\Login;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/admin/login', Login::class)->name('filament.admin.pages.login');
Route::get('/admin/register', [RegisterController::class, 'show'])->name('filament.admin.pages.register');
Route::post('/admin/register', [RegisterController::class, 'store'])->name('register.store');

// Password Reset Routes
Route::get('/admin/forgot-password', [ForgotPasswordController::class, 'show'])->name('password.request');
Route::post('/admin/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
Route::get('/admin/reset-password/{token}', [ResetPasswordController::class, 'show'])->name('password.reset');
Route::post('/admin/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');