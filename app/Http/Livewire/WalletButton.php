<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Traits\AuthRefreshed;

class WalletButton extends Component
{
    public $classAdded = '';

    use AuthRefreshed;
}
