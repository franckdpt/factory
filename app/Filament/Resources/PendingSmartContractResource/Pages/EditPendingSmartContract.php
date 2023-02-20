<?php

namespace App\Filament\Resources\PendingSmartContractResource\Pages;

use App\Filament\Resources\PendingSmartContractResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendingSmartContract extends EditRecord
{
    protected static string $resource = PendingSmartContractResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
