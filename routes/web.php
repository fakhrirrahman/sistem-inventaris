<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\Login;
use App\Filament\Pages\Register;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/admin/login', Login::class)->name('filament.admin.pages.login');
Route::get('/admin/register', Register::class)->name('filament.admin.pages.register');
