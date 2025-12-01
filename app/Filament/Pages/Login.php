<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Login extends Page
{
    protected string $view = 'filament.pages.auth.login';
    
    // This page is public - no auth required
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    
    public ?string $email = '';
    public ?string $password = '';
    public bool $remember = false;

    public function authenticate(): void
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (auth()->attempt($credentials, $this->remember)) {
            session()->regenerate();
            redirect()->intended('/admin');
        } else {
            $this->addError('email', 'Email atau password salah.');
        }
    }
}
