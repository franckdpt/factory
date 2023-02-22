<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\SmartContract;
use App\Http\Livewire\Traits\AuthRefreshed;
use App\Models\Network;
use Illuminate\Support\Facades\Auth;

class Mint extends Component
{
    use AuthRefreshed;

    public ?SmartContract $smart_contract = null;
    public $smart_contract_address = '';
    public $smart_contract_price = '';
    public $abi;
    public $network_public_id;
    public $client_network_id;
    public $auth_address;
    public $state;

    public function mount($smart_contract_publicid)
    {
        $this->abi = config("contracts.artist.abi");
        $this->smart_contract = SmartContract::wherePublicId($smart_contract_publicid)
                                                // ->where("deployed", 1)
                                                ->firstOrFail();
        $this->smart_contract_address = $this->smart_contract->address;
        $this->smart_contract_price = $this->smart_contract->artwork_price;

        if ($this->smart_contract->network_id) {
            $this->network_public_id = Network::ID[$this->smart_contract->network->public_id][env('BLOCKCHAIN_ENV')];
        }
    }

    public function userChangedNetwork($id)
    {
        $this->client_network_id = $id;
    }
}
