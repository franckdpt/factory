<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\SmartContract;
use App\Http\Livewire\Traits\AuthRefreshed;
use App\Models\Network;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

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
    public $soldout = false;
    public $is_minting = false;
    public $sales_open = true;
    public $is_deployed = false;
    public $is_minted = false;
    public $openSeaUrl;
    public $openSeaFloorPrice;

    public $hash;
    public $token_id;

    protected $listeners = [
        'fetchedSupply',
        'minting',
        'minted',
    ];

    public function mount($smart_contract_publicid)
    {
        $this->abi = json_decode(Storage::disk('local')->get('sc-721-1.json'), true)['abi'];

        $this->smart_contract = SmartContract::wherePublicId($smart_contract_publicid)
                                                // ->where("deployed", 1)
                                                ->firstOrFail();
        $this->smart_contract_address = $this->smart_contract->address;
        $this->smart_contract_price = $this->smart_contract->artwork_price;
        $this->is_deployed = $this->smart_contract->deployed;

        if ($this->smart_contract->network_id) {
            $this->network_public_id = Network::ID[$this->smart_contract->network->public_id][env('BLOCKCHAIN_ENV')];
            $this->client_network_id = Network::ID[$this->smart_contract->network->public_id][env('BLOCKCHAIN_ENV')];
        }

        // TODO support other chains
        if ($this->smart_contract->address) {
            $endpoint = "https://eth-mainnet.g.alchemy.com/nft/v2/".env('ALCHEMY_API_KEY');
            $endpoint = $endpoint . "/getFloorPrice";
            $endpoint = $endpoint . "?contractAddress=".$this->smart_contract->address;
            
            $response = Http::withHeaders([
                'Host' => 'eth-mainnet.g.alchemy.com',
                'Accept' => 'application/json'
            ])->get($endpoint);
            
            if ($response->successful()) {
                if ($response->json()["openSea"]) {
                    if (isset($response->json()["openSea"]["collectionUrl"])) {
                        $this->openSeaUrl = $response->json()["openSea"]["collectionUrl"];
                    }
                    if (isset($response->json()["openSea"]["floorPrice"])) {
                        $this->openSeaFloorPrice = $response->json()["openSea"]["floorPrice"];
                    }
                }
            }
        }

        $this->checkIfSoldout();
    }

    public function checkIfSoldout()
    {
        // TODO use isSoldout()
        if ($this->smart_contract->artwork_max_supply == $this->smart_contract->artwork_total_supply) {
            $this->soldout = true;
        }
    }

    public function minting()
    {
        $this->is_minting = true;
    }

    public function minted($hash, $tokenid)
    {
        $this->is_minting = false;

        $this->hash = $hash;
        $this->token_id = $tokenid;
        $this->is_minted = true;

        $this->smart_contract->artwork_total_supply = $this->smart_contract->artwork_total_supply + 1;
        $this->smart_contract->save();

        $this->checkIfSoldout();
    }

    public function fetchedSupply($maxSupply, $totalSupply)
    {
        if (!is_null($maxSupply) && !is_null($totalSupply)) {
            $this->smart_contract->artwork_max_supply = intval($maxSupply);
            $this->smart_contract->artwork_total_supply = intval($totalSupply);
            $this->smart_contract->save();
        }
        $this->checkIfSoldout();
    }

    public function userChangedNetwork($id)
    {
        $this->client_network_id = $id;
    }
}
