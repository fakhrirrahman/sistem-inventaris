<?php

namespace App\Filament\Resources\Peminjamen;

use App\Filament\Resources\Peminjamen\Pages\CreatePeminjaman;
use App\Filament\Resources\Peminjamen\Pages\EditPeminjaman;
use App\Filament\Resources\Peminjamen\Pages\ListPeminjamen;
use App\Filament\Resources\Peminjamen\Schemas\PeminjamanForm;
use App\Filament\Resources\Peminjamen\Tables\PeminjamenTable;
use App\Models\Peminjaman;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'barang.nama_barang';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->when(! auth()->user()->hasRole('Superadmin'), function ($query) {
            $query->where('user_id', auth()->id());
        });
    }

    public static function getNavigationLabel(): string
    {
        return 'Peminjaman';
    }
    protected static function getBreadcrumbs(): array
    {
        return [
            static::getResource()::getUrl('index') => 'Peminjaman',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return PeminjamanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PeminjamenTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPeminjamen::route('/'),
            'create' => CreatePeminjaman::route('/create'),
            'edit' => EditPeminjaman::route('/{record}/edit'),
        ];
    }
}
