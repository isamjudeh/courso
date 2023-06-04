<?php

namespace App\Filament\Resources\RegisterationResource\Pages;

use App\Filament\Resources\RegisterationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegisterations extends ListRecords
{
    protected static string $resource = RegisterationResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
