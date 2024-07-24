<?php

namespace App\Filament\Resources\HoldingLocationResource\Pages;

use App\Filament\Resources\HoldingLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHoldingLocations extends ListRecords
{
    protected static string $resource = HoldingLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
