<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WalletButton extends Component
{    
    public $auth_user = null;

    protected $listeners = [
        'userConnected',
        'userDisconnected'
    ];

    public function render()
    {
        return view('livewire.wallet-button');
    }

    // just because Auth::user doesnt refresh components when it changes
    public function userConnected()
    {
        $this->auth_user = Auth::user();
    }

    public function userDisconnected()
    {
        $this->auth_user = null;
    }
}
