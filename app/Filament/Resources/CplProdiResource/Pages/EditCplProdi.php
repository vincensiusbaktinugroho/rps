<?php

namespace App\Filament\Resources\CplProdiResource\Pages;

use App\Filament\Resources\CplProdiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCplProdi extends EditRecord
{
    protected static string $resource = CplProdiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
