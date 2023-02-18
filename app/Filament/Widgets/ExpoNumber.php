<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use App\Models\SmartContract;
use App\Models\Expo;

class ExpoNumber extends BaseWidget
{
    // protected static string $view = 'filament.widgets.expo-number';

    protected function getCards(): array
    {
        return [
            Card::make('Total Unique visitors', User::count()),
            Card::make('Expositions', Expo::count()),
            Card::make('Deployed Artworks', SmartContract::whereDeployed(true)->count()),
        ];
    }
}
