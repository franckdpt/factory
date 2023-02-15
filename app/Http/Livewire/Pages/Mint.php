<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\SmartContract;
use App\Http\Livewire\Traits\AuthRefreshed;

class Mint extends Component
{
    use AuthRefreshed;

    public ?SmartContract $smart_contract = null;

    public function mount($smart_contract_address)
    {
        // $this->smart_contract = SmartContract::whereAddress($smart_contract_address)->firstOrFail();
        $this->smart_contract = SmartContract::wherePublicId($smart_contract_address)->firstOrFail();
    }
}
