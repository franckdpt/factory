<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\SmartContract;
use App\Http\Livewire\Traits\WithAuthUser;

class Mint extends Component
{
    use WithAuthUser;

    public ?SmartContract $smart_contract = null;

    public function mount($smart_contract_id)
    {
        $this->smart_contract = SmartContract::wherePublicId($smart_contract_id)->first();
    }

    public function render()
    {
        return view('livewire.pages.mint')
                ->layout('layouts.app');
    }
}
