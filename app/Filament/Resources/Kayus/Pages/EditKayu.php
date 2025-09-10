<?php

namespace App\Filament\Resources\Kayus\Pages;

use App\Filament\Resources\Kayus\KayuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKayu extends EditRecord
{
    protected static string $resource = KayuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
