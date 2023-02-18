<?php

namespace App\Filament\Resources\SmartContractResource\Pages;

use App\Filament\Resources\SmartContractResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmartContract extends EditRecord
{
    protected static string $resource = SmartContractResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
