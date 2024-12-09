<?php

namespace App\Filament\Resources\CplProdiResource\Pages;

use App\Filament\Resources\CplProdiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCplProdi extends ViewRecord
{
    protected static string $resource = CplProdiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
