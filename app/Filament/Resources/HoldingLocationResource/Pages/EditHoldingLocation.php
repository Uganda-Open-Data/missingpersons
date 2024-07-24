<?php

namespace App\Filament\Resources\HoldingLocationResource\Pages;

use App\Filament\Resources\HoldingLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHoldingLocation extends EditRecord
{
    protected static string $resource = HoldingLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
