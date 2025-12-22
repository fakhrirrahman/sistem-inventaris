<?php

namespace App\Filament\Resources\Peminjamen\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
class PeminjamenTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make('user.name')
                    ->label('Nama Peminjam')
                    ->searchable(),
                TextColumn::make('barang.nama_barang')
                    ->label('Barang Dipinjam')
                    ->searchable(),
                TextColumn::make('tanggal_pinjam')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('tanggal_kembali')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('alasan_peminjaman')
                    ->searchable(),
                TextColumn::make('jumlah_peminjaman')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
