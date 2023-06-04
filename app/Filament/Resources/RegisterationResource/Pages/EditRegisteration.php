<?php

namespace App\Filament\Resources\RegisterationResource\Pages;

use App\Filament\Resources\RegisterationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegisteration extends EditRecord
{
    protected static string $resource = RegisterationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
