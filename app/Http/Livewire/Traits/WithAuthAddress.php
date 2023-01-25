<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\Auth;

trait WithAuthAddress
{
    public $auth_address;

    protected function getListeners()
    {
        return [
            'userConnected',
            'userDisconnected',
        ];
    }

    public function bootWithAuthAddress()
    {
        $this->auth_address = Auth::check() ? Auth::user()->eth_address : null;
    }

    public function userConnected()
    {
        $this->auth_address = Auth::user()->eth_address;
    }

    public function userDisconnected()
    {
        $this->auth_address = null;
    }
}