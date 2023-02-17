<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Traits\AuthRefreshed;
use Filament\Facades\Filament;

class AdminLogin extends Component
{
    use AuthRefreshed;

    public function mount(): void
    {
        $this->tryToConnect();
    }

    public function userConnected()
    {
        $this->tryToConnect();
    }

    private function tryToConnect()
    {
        if (Filament::auth()->check() && Auth::user()->admin) {
            redirect()->intended(Filament::getUrl());
        }
    }
}
