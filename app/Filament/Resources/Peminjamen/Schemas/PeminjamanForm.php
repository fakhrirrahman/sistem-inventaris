<?php

namespace App\Filament\Resources\Peminjamen\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PeminjamanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('customer_id')
                    ->required()
                    ->numeric(),
                TextInput::make('barang_id')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('tanggal_pinjam')
                    ->required(),
                DateTimePicker::make('tanggal_kembali'),
                TextInput::make('alasan_peminjaman')
                    ->required(),
                TextInput::make('jumlah_peminjaman')
                    ->required(),
            ]);
    }
}
