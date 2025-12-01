<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('nomor_induk')
                    ->required(),
                TextInput::make('alamat')
                    ->required(),
                TextInput::make('kelas')
                    ->required(),
                TextInput::make('jurusan')
                    ->required(),
            ]);
    }
}
