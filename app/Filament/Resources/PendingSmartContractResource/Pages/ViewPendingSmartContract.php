<?php

namespace App\Filament\Resources\SmartContractResource\Pages;

use App\Filament\Resources\SmartContractResource;
use App\Filament\Resources\PendingSmartContractResource;
use Filament\Pages\Actions\Action;
use Filament\Tables\Actions\Position;
use Filament\Resources\Pages\ViewRecord;

class ViewPendingSmartContract extends ViewRecord
{
    protected static string $resource = PendingSmartContractResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('approve contract')
                ->action(function() {
                    $this->record->status = 'ready_to_deploy';
                    $this->record->save();
                    redirect()->to($this->getResource()::getUrl('index'));
                })
                ->requiresConfirmation()
        ];
    }

    protected function getFooterWidgetsColumns(): int | array
    {
        return 3;
    }

    protected function getFooterWidgets(): array
    {
        return [
            SmartContractResource\Widgets\SmartContractArtworkVisual::class,
            SmartContractResource\Widgets\SmartContractArweaveArtworkVisual::class,
            SmartContractResource\Widgets\SmartContractIpfsArtworkVisual::class,
            SmartContractResource\Widgets\SmartContractContractJson::class,
            SmartContractResource\Widgets\SmartContractTokenJson::class,
        ];
    }
}
