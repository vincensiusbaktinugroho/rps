<?php

namespace App\Filament\Resources\RpsResource\Pages;

use App\Filament\Resources\RpsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRps extends ViewRecord
{
    protected static string $resource = RpsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
