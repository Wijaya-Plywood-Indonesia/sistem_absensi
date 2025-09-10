<?php

namespace App\Filament\Resources\Kayus\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class KayuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('kode_jenis_kayu')
                    ->label('Kode Kayu')
                    ->required()
                    ->maxLength(length: 20),

                Forms\Components\TextInput::make('nama_jenis_kayu')
                    ->label('Nama Kayu')
                    ->required()
                    ->maxLength(length: 100),
            ]);
    }
}
