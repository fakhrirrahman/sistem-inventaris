<?php

namespace App\Filament\Resources\Peminjamen\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class PeminjamanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->default(fn () => auth()->user()->hasRole('super_admin') ? null : auth()->id())
                    ->disabled(fn () => !auth()->user()->hasRole('super_admin'))
                    ->dehydrated(),
                Select::make('barang_id')
                    ->relationship('barang', 'nama_barang')
                    ->searchable()
                    ->preload()
                    ->required(),
                DateTimePicker::make('tanggal_pinjam')
                    ->required(),
                DateTimePicker::make('tanggal_kembali'),
                TextInput::make('alasan_peminjaman')
                    ->required(),
                TextInput::make('jumlah_peminjaman')
                    ->required()
                    ->numeric(),

            ]);
    }
}
