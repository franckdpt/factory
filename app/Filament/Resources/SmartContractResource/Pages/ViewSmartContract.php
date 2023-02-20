<?php

namespace App\Filament\Resources\SmartContractResource\Pages;

use App\Filament\Resources\SmartContractResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewSmartContract extends ViewRecord
{
    protected static string $resource = SmartContractResource::class;

    protected function getActions(): array
    {
        if ($this->record->status == 'in_review') {
            return [
                Action::make('approve contract')
                    ->action(function() {
                        $this->record->status = 'ready_to_deploy';
                        $this->record->save();
                        redirect()->to($this->getResource()::getUrl('index'));
                    })
                    ->requiresConfirmation()
            ];
        } else {
            return [];
        }
    }

    protected function getFooterWidgets(): array
    {
        return [
            SmartContractResource\Widgets\SmartContractArtworkVisual::class,
        ];
    }
}
