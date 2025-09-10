<?php

namespace App\Filament\Resources\Kayus;

use App\Filament\Resources\Kayus\Pages\CreateKayu;
use App\Filament\Resources\Kayus\Pages\EditKayu;
use App\Filament\Resources\Kayus\Pages\ListKayus;
use App\Filament\Resources\Kayus\Schemas\KayuForm;
use App\Filament\Resources\Kayus\Tables\KayusTable;
use App\Models\Kayu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KayuResource extends Resource
{
    protected static ?string $model = Kayu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Kayu';

    public static function form(Schema $schema): Schema
    {
        return KayuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KayusTable::configure($table);
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
            'index' => ListKayus::route('/'),
            'create' => CreateKayu::route('/create'),
            'edit' => EditKayu::route('/{record}/edit'),
        ];
    }
}
