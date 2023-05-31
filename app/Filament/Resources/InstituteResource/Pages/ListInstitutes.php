<?php

namespace App\Filament\Resources\InstituteResource\Pages;

use App\Filament\Resources\InstituteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInstitutes extends ListRecords
{
    protected static string $resource = InstituteResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
