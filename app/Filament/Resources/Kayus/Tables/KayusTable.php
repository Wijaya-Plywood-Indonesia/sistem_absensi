<?php

namespace App\Filament\Resources\Kayus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use App\Filament\Resources\Employees\EmployeeResource;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Enums\RecordActionsPosition;

class KayusTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->sortable(),

            Tables\Columns\TextColumn::make('kode_jenis_kayu')
                ->label('Jenis Kayu')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('nama_jenis_kayu')
                ->label('Nama Kayu'),
        ])

            ->recordActions([
                // EDIT: arahkan ke halaman edit resource (form builder)
                Action::make('edit')
                    ->label('') // kosong => hanya icon
                    ->icon('heroicon-o-pencil-square')
                    ->tooltip('Edit Data')
                    ->url(fn($record): string => EmployeeResource::getUrl('edit', ['record' => $record->getKey()])),

                // DELETE: konfirmasi modal, lalu hapus record
                Action::make('delete')
                    ->label('')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Yakin hapus data ini?')
                    ->modalDescription(fn($record) => "Hapus karyawan: {$record->nama}?")
                    ->modalSubmitActionLabel('Ya, hapus')
                    ->action(fn($record) => $record->delete())
                    ->tooltip('Hapus Data'),
            ], position: RecordActionsPosition::BeforeColumns)
            ->bulkActions([
                BulkAction::make('delete')
                    ->label('Hapus Terpilih')
                    ->requiresConfirmation()
                    ->modalHeading('Hapus data terpilih?')
                    ->modalSubmitActionLabel('Ya, hapus')
                    ->action(fn($records) => $records->each->delete()),
            ]);
    }
}
