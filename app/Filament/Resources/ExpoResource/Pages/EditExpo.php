<?php

namespace App\Filament\Resources\ExpoResource\Pages;

use App\Filament\Resources\ExpoResource;
use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditExpo extends EditRecord
{
    protected static string $resource = ExpoResource::class;

    protected function getActions(): array
    {
        $action = [];
        // $action[] = Actions\DeleteAction::make();
        $action[] = Action::make('Gallery page')->icon('heroicon-o-document-text')->url(route('expo', ['expo' => $this->record]));
        $action[] = Action::make('Deployment page')->icon('heroicon-o-document-text')->url(route('deploy', ['expo' => $this->record]));

        return $action;
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
