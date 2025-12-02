<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Barang;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class BarangSeringDipinjamWidget extends BaseWidget
{
    protected static ?string $heading = 'Barang yang sering dipinjam';

    public function table(Table $table): Table
    {
        $barangSeringDipinjam = DB::table('peminjaman')
            ->join('barang', 'peminjaman.barang_id', '=', 'barang.id')
            ->select('barang.id', 'barang.nama_barang', DB::raw('count(*) as jumlah_peminjaman'))
            ->groupBy('barang.id', 'barang.nama_barang')
            ->orderByDesc('jumlah_peminjaman')
            ->limit(5)
            ->get();

        return $table
            ->query(
                Barang::whereIn('id', $barangSeringDipinjam->pluck('id'))
            )
            ->columns([
                TextColumn::make('id')
                    ->label('ID Barang')
                    ->sortable(),
                TextColumn::make('nama_barang')
                    ->label('Nama Barang')
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
