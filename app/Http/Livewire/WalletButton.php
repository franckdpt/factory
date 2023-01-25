<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Traits\WithAuthAddress;

class WalletButton extends Component
{
    use WithAuthAddress;

    public function render()
    {
        return view('livewire.wallet-button');
    }
}
