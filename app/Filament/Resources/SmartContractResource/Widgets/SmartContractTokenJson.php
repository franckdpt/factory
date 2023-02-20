<?php

namespace App\Filament\Resources\SmartContractResource\Widgets;

use Filament\Widgets\Widget;
use App\Models\SmartContract;

class SmartContractTokenJson extends Widget
{
    public ?SmartContract $record = null;

    protected static string $view = 'filament.resources.smart-contract-resource.widgets.smart-contract-token-json';
}
