<?php

namespace App\Filament\Resources\PersetujuanrpsResource\Pages;

use App\Filament\Resources\PersetujuanrpsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersetujuanrps extends EditRecord
{
    protected static string $resource = PersetujuanrpsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
