<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Peminjaman;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LogPeminjamanWidget extends BaseWidget
{
    protected static ?string $heading = 'Log Peminjaman';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Peminjaman::query()
                    ->with(['user', 'barang'])
                    ->when(
                        ! auth()->user()->hasRole('super_admin'),
                        fn($query) => $query->where('user_id', auth()->id())
                    )
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),

                TextColumn::make('user.name')
                    ->label('Nama Peminjam')
                    ->sortable(),

                TextColumn::make('tanggal_pinjam')
                    ->label('Tanggal Peminjaman')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('tanggal_kembali')
                    ->label('Tanggal Pengembalian')
                    ->date('d/m/Y')
                    ->placeholder('-'),

                BadgeColumn::make('status')
                    ->getStateUsing(function ($record) {
                        return $record->tanggal_kembali
                            ? 'dikembalikan'
                            : 'dipinjam';
                    })
                    ->colors([
                        'success' => 'dikembalikan',
                        'warning' => 'dipinjam',
                    ]),
            ])
            ->paginated(false);
    }
}
