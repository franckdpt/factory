<?php

namespace App\Filament\Resources\ExpoResource\Pages;

use App\Filament\Resources\ExpoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExpos extends ListRecords
{
    protected static string $resource = ExpoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
