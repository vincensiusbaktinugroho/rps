<?php

namespace App\Filament\Resources\CplProdiResource\Pages;

use App\Filament\Resources\CplProdiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCplProdis extends ListRecords
{
    protected static string $resource = CplProdiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
