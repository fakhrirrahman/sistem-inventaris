<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;

#[Layout('filament-panels::components.layout.base')]
class Register extends Page
{
    protected string $view = 'filament.pages.auth.register';
    
    protected static string $layout = 'filament-panels::components.layout.base';
    
    public ?string $name = '';
    public ?string $email = '';
    public ?string $password = '';
    public ?string $password_confirmation = '';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function register(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Akun berhasil dibuat! Silakan login.');
        $this->redirect('/admin/login');
    }
}