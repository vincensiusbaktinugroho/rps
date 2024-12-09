<?php

namespace App\Filament\Resources\SubCpmkResource\Pages;

use App\Filament\Resources\SubCpmkResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubCpmk extends ViewRecord
{
    protected static string $resource = SubCpmkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
