<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Expo;
use App\Http\Livewire\Traits\AuthRefreshed;
use App\Models\Network;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class MintCustom2 extends Component
{
    use AuthRefreshed;

    public $expo;

    public function mount()
    {
        $this->expo = Expo::whereSlug('100-ai')->firstOrFail();
    }

    public function render()
    {
        return view('livewire.pages.mint-custom2')
            ->layout('layouts.app');
    }
}
