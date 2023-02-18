<?php

namespace App\Filament\Resources\ExpoResource\Pages;

use App\Filament\Resources\ExpoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExpo extends EditRecord
{
    protected static string $resource = ExpoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
