<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('nama')
                ->label('Nama')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('alamat')
                ->label('Alamat')
                ->required(),

            Forms\Components\Select::make('gender')
                ->label('Jenis Kelamin')
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                ])
                ->required(),

            Forms\Components\DatePicker::make('joined_date')
                ->label('Tanggal Bergabung')
                ->required(),

            Forms\Components\TextInput::make('phone_number')
                ->label('Nomor HP')
                ->tel()
                ->required()
                ->minLength(10)
                ->maxLength(15)
                ->numeric(),
        ]);
    }
}
