<?php

namespace App\Filament\Resources\ExpoResource\Pages;

use App\Filament\Resources\ExpoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExpo extends CreateRecord
{
    protected static string $resource = ExpoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
