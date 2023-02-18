<?php

namespace App\Filament\Resources\SmartContractResource\Pages;

use App\Filament\Resources\SmartContractResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmartContracts extends ListRecords
{
    protected static string $resource = SmartContractResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
