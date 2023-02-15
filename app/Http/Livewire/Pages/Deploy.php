<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Traits\WithNetworks;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SmartContract;

class Deploy extends Component
{
    use WithFileUploads, WithNetworks;

    // Livewire variables
    public ?SmartContract $smart_contract = null;
    public $abi, $byte, $arweave_key, $hd_media, $contract_data_json_url, $state;
    public $artist_name = "";

    // SmartContract object
    public $public_id = null;

    public $network = "";
    public $name = "";
    public $symbol = "";
    public $description = "nft factory desc";
    public $free_nft = false;
    
    public $artwork_title = "";
    public $artwork_description = "";
    public $artwork_hd_extension = "";
    public $artwork_max_supply = null;
    public $artwork_price = null;
    public $artwork_royalty = null;
    
    public $artist_portfolio_link = "";
    public $artist_twitter_link = "";
    public $artist_contact_mail = "";
    
    public $ipfs_hash = "";
    public $ipfs_json_hash = "";
    public $arweave_hash = "";
    public $sha_hash = "";
    public $address = "";
    public $deployed = false;

    protected $listeners = [
        'userConnected',
        'userDisconnected',

        'readyToUploadIpfs',
        'readyToUploadArweave',
        'readyToCreateAndUploadJsonTokenIpfs',
        'readyToDeploySmartContract',

        'arweaveUploaded',
        'smartContractDeployed',
    ];

    protected function rules()
    {
        return [
            'public_id' => 'required|string',
            
            'network' => 'required|string',
            'name' => 'required|string|max:25',
            'symbol' => 'required|string|max:5',
            'description' => 'required|string|max:420',
            'free_nft' => 'required',
            // 'artist_name' => 'nullable|string',

            'artwork_title' => 'required|string|max:25',
            'artwork_description' => 'required|string|max:420',
            'artwork_max_supply' => 'required|numeric|min:1|max:100',
            'artwork_price' => 'required|numeric',
            // 'artwork_royalty' => 'required|numeric|max:10',

            'artist_portfolio_link' => 'nullable|url',
            'artist_twitter_link' => 'nullable|url',
            'artist_contact_mail' => 'nullable|email',

            'hd_media' => 'required|max:10000',
            // 'ld_media' => 'required|max:100',
            // 'email' => ['required', 'email', 'not_in:' . auth()->user()->email],
        ];
    }

    public function mount($smart_contract_id = null)
    {
        if ($smart_contract_id) {
            $this->smart_contract = SmartContract::wherePublicId($smart_contract_id)
                                                ->whereDeployed(false)
                                                ->first();
            if (is_null($this->smart_contract)) {
                return redirect()->route('deploy');
            }
        }
    }
    
    public function userConnected()
    {
        if ($this->smart_contract) {
            if ($this->smart_contract->user_id == Auth::user()->id) {
                $this->public_id = $this->smart_contract->public_id;
            
                $this->network = $this->smart_contract->network;
                $this->name = $this->smart_contract->name;
                $this->symbol = $this->smart_contract->symbol;
                $this->description = $this->smart_contract->description;
                $this->free_nft = $this->smart_contract->free_nft;
                
                $this->artwork_title = $this->smart_contract->artwork_title;
                $this->artwork_description = $this->smart_contract->artwork_description;
                $this->artwork_hd_extension = $this->smart_contract->artwork_hd_extension;
                $this->artwork_max_supply = $this->smart_contract->artwork_max_supply;
                $this->artwork_price = $this->smart_contract->artwork_price;
                $this->artwork_royalty = $this->smart_contract->artwork_royalty;
                
                $this->artist_portfolio_link = $this->smart_contract->artist_portfolio_link;
                $this->artist_twitter_link = $this->smart_contract->artist_twitter_link;
                $this->artist_contact_mail = $this->smart_contract->artist_contact_mail;

                $this->ipfs_hash = $this->smart_contract->ipfs_hash;
                $this->ipfs_json_hash = $this->smart_contract->ipfs_json_hash;
                $this->arweave_hash = $this->smart_contract->arweave_hash;
                $this->sha_hash = $this->smart_contract->sha_hash;
                $this->address = $this->smart_contract->address;
                $this->deployed = $this->smart_contract->deployed;

                $this->artist_portfolio_link = $this->smart_contract->portfolio_link;
                $this->artist_twitter_link = $this->smart_contract->twitter_link;
                $this->artist_contact_mail = $this->smart_contract->contact_mail;
                // $this->artist_name = Auth::user()->name;
            }
        }
    }

    public function updated($propertyName)
    {
        if (is_null($this->public_id)) {
            $this->public_id = SmartContract::generatePublicId();
        }

        $validatedData = $this->validateOnly($propertyName);

        $this->smart_contract = SmartContract::updateOrCreate(
            [ 'public_id' => $this->public_id ], array_merge(
                $validatedData,
                [ 'user_id' => Auth::user()->id ])
        );
    }

    public function updatedHdMedia()
    {
        $this->artwork_hd_extension = explode('/', $this->hd_media->getMimeType())[1];

        // $this->hd_media->storeAs('nft_media', $this->public_id.'_hd.'.$this->artwork_hd_extension);
        $path = $this->hd_media->storePubliclyAs(
            'nft_media',
            $this->public_id.'_hd.'.$this->artwork_hd_extension,
            'public'
        );

        $this->sha_hash = hash_file('sha256', public_path('storage/nft_media/'.$this->public_id.'_hd.'.$this->artwork_hd_extension));

        $this->smart_contract->sha_hash = $this->sha_hash;
        $this->smart_contract->artwork_hd_extension = $this->artwork_hd_extension;
        $this->smart_contract->save();
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->smart_contract = SmartContract::updateOrCreate(
            [ 'public_id' => $this->public_id ], array_merge(
                $validatedData,
                [ 'user_id' => Auth::user()->id ])
        );

        $this->state = 'Uploading media on IPFS...';
        $this->emit('readyToUploadIpfs');
    }

    public function readyToUploadIpfs()
    {
        $this->ipfs_hash = $this->uploadFileToIpfs(
            $this->hd_media->getRealPath(),
            $this->hd_media->getMimeType(),
            $this->public_id.'_hd'
        );

        $this->smart_contract->ipfs_hash = $this->ipfs_hash;
        $this->smart_contract->save();

        if (empty($this->ipfs_hash)) {
            dd('error on uploading IPFS');
        }
        
        // Next
        $this->state = 'Uploading media on Arweave...';
        $this->emit('readyToUploadArweave');
    }

    public function readyToUploadArweave()
    {
        $this->arweave_key = Storage::disk('local')->get('hW-arweave.json');

        // Next on JS side.
        $this->emit('uploadArweaveOnJs', $this->hd_media->getMimeType());
    }

    public function arweaveUploaded()
    {
        $this->smart_contract->arweave_hash = $this->arweave_hash;
        $this->smart_contract->save();

        if (empty($this->arweave_hash)) {
            dd('error on uploading Arweave');
        }

        // Next
        $this->state = 'Creating & uploading JSON token to IPFS...';
        $this->emit('readyToCreateAndUploadJsonTokenIpfs');
    }

    public function readyToCreateAndUploadJsonTokenIpfs()
    {
        $this->createJsonToken();
            
        $this->ipfs_json_hash = $this->uploadFileToIpfs(
            public_path('storage/jsons/'.$this->public_id.'.json'),
            'application/json',
            $this->public_id
        );

        $this->smart_contract->ipfs_json_hash = $this->ipfs_json_hash;
        $this->smart_contract->save();

        if (empty($this->ipfs_hash)) {
            dd('error on uploading IPFS');
        }

        // Next
        $this->state = 'Creating smart contract...';
        $this->emit('readyToDeploySmartContract');
    }

    public function readyToDeploySmartContract()
    {
        $this->abi = config("contracts.artist.abi");
        $this->byte = config("contracts.artist.byte");

        $this->createJsonContract();

        // Next on JS side.
        $this->state = 'Deploying smart contract...';
        $this->emit('deploySmartContractOnJs');
    }

    public function smartContractDeployed($address)
    {
        $this->deployed = true;
        $this->address = $address;

        $this->smart_contract->deployed = $this->deployed;
        $this->smart_contract->address = $this->address;
        $this->smart_contract->save();

        if (empty($this->address)) {
            dd('error on deploying contract');
        }
    }

    //////////////

    public function createJsonToken()
    {
        $data = [
            "name" => $this->artwork_title,
            "collection" => $this->name,
            "description" => $this->artwork_description,
            "image" => "https://gateway.pinata.cloud/ipfs/".$this->ipfs_hash,
            "image_arweave" => "http://arweave.net/".$this->arweave_hash,
            "image_ipfs" => "https://gateway.pinata.cloud/ipfs/".$this->ipfs_hash,
            "image_sha256" => $this->sha_hash,
        ];

        if (file_put_contents('storage/jsons/'.$this->public_id.'.json', json_encode($data))) {
            
        } else {
            dd('Error on creating token json');
        }
    }

    public function createJsonContract()
    {
        $contract_data = [
            "name" => $this->name,
            "description" => $this->description,
            "image" => public_path('storage/nft_media/'.$this->public_id.'_hd.'.$this->artwork_hd_extension),
            "external_link" => public_path('storage/nft_media/'.$this->public_id.'_hd.'.$this->artwork_hd_extension),
            "seller_fee_basis_points" => 100, # Indicates a 1% seller fee.
            "fee_recipient" => Auth::user()->eth_address
        ];
        
        if (file_put_contents('storage/jsons/'.$this->public_id.'_contract.json', json_encode($contract_data))) {
            $this->contract_data_json_url = public_path('storage/jsons/'.$this->public_id.'_contract.json');
        } else {
            dd('Error on creating contract json');
        }
    }
    
    public function uploadFileToIpfs($path, $type, $name)
    {
        $curl = curl_init();
        $tmp = curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.pinata.cloud/pinning/pinFileToIPFS",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array('file' => curl_file_create($path, $type, $name)),
            CURLOPT_HTTPHEADER => [
                "pinata_api_key: ".env('PINATA_KEY'),
                "pinata_secret_api_key: ".env('PINATA_SECRET')
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            dd($err);
        } else {
            return json_decode($response)->IpfsHash;
        }
    }

    public function render()
    {
        return view('livewire.pages.deploy')
                ->layout('layouts.app');
    }
}
