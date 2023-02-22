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
        $actions = [];
        $actions[] = Action::make('Mint page')
                    ->icon('heroicon-o-document-text')
                    ->url(route('mint', ['expo' => $this->record->expo, 'smart_contract_publicid' => $this->record->public_id]));

        if ($this->record->status == 'in_review') {
            $actions[] = Action::make('approve contract')
                            ->action(function() {
                                $this->record->status = 'ready_to_deploy';
                                $this->record->save();
                                redirect()->to($this->getResource()::getUrl('index'));
                            })
                            ->requiresConfirmation();
        }

        return $actions;
    }

    protected function getFooterWidgets(): array
    {
        return [
            SmartContractResource\Widgets\SmartContractArtworkVisual::class,
        ];
    }
}
