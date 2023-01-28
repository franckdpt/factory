<?php

namespace App\Http\Livewire\Traits;

trait WithNetworks
{
    public $possible_networks = [
        "ethereum" => [
            "displayed_name" => "Ethereum",
        ],
        "polygon" => [
            "displayed_name" => "Polygon",
        ],
    ];
}