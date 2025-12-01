<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_barang')
                    ->required(),
                TextInput::make('jenis_barang')
                    ->required(),
                TextInput::make('merk')
                    ->required(),
                TextInput::make('spesifikasi')
                    ->required(),
                DateTimePicker::make('tahun_pengadaan')
                    ->required(),
                TextInput::make('sumber_anggaran')
                    ->required(),
                TextInput::make('lokasi_simpan')
                    ->required(),
                Textarea::make('catatan')
                    ->columnSpanFull(),
            ]);
    }
}
