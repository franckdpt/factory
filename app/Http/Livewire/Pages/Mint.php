<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Http\Livewire\Traits\WithAuthAddress;

class Mint extends Component
{
    use WithAuthAddress;

    public function render()
    {
        return view('livewire.pages.mint')
                ->layout('layouts.app');
    }
}
