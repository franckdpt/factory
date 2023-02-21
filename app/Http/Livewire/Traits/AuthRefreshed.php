<?php

namespace App\Http\Livewire\Traits;

trait AuthRefreshed
{

    public function initializeAuthRefreshed()
    {
        $this->listeners = array_merge($this->listeners, [
            'userConnected',
            'userDisconnected',
            'userChangedNetwork'
        ]);
    }

    public function userConnected()
    {
        // blank. It's juste to refresh the component, to refresh Auth:: facade user on view side.
    }

    public function userDisconnected()
    {
        // blank. It's juste to refresh the component, to refresh Auth:: facade user on view side.
    }

    public function userChangedNetwork($id)
    {
        // blank. It's juste to refresh the component, to refresh Auth:: facade user on view side.
    }
}