<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Livewire\Attributes\Layout;

#[Layout('filament-panels::components.layout.base')]
class Register extends Page
{
    protected string $view = 'filament.pages.auth.register';
    
    protected static string $layout = 'filament-panels::components.layout.base';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}