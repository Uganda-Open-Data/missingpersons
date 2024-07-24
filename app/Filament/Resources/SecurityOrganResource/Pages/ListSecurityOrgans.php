<?php

namespace App\Filament\Resources\SecurityOrganResource\Pages;

use App\Filament\Resources\SecurityOrganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSecurityOrgans extends ListRecords
{
    protected static string $resource = SecurityOrganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
