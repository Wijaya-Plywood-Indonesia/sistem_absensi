<?php

namespace App\Filament\Resources\Kayus\Pages;

use App\Filament\Resources\Kayus\KayuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKayus extends ListRecords
{
    protected static string $resource = KayuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
