<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SmartContract;
use App\Models\User;
use App\Http\Livewire\Traits\WithNetworks;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class Deploy extends Component
{
    use WithFileUploads, WithNetworks;

    public ?User $auth_user = null;
    public ?SmartContract $smart_contract = null;
    public $state = null;

    public $public_id = null;
    public $deployed = false;

    // Blockchain & Smart Contract
    public $network = "";
    public $name = "";
    public $symbol = "";
    public $description = "";
    public $artist_name = "";

    // Artwork
    public $artwork_title = "";
    public $artwork_description = "";
    public $hd_media;
    public $ld_media;
    public $artwork_max_supply = null;
    public $artwork_price = null;
    public $artwork_royalty = null; //
    public $free_nft = false;

    // Mint page
    public $artist_portfolio_link = "";
    public $artist_twitter_link = "";
    public $artist_contact_mail = "";

    // OpenGem contract
    public $abi, $byte, $arweave_key;

    // Output variables
    public $arweave_hash;
    public $ipfs_hash;
    public $ipfs_json_hash;
    public $sha_hash;
    public $contract_data_json;
    public $base_url;

    protected $listeners = [
        'userConnected',
        'userDisconnected',
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
            'artist_name' => 'nullable|string',

            'artwork_title' => 'required|string|max:25',
            'artwork_description' => 'required|string|max:420',
            'artwork_max_supply' => 'required|numeric|min:1|max:100',
            'artwork_price' => 'required|numeric',
            'artwork_royalty' => 'required|numeric|max:10',

            'artist_portfolio_link' => 'nullable|url',
            'artist_twitter_link' => 'nullable|url',
            'artist_contact_mail' => 'nullable|email',

            'hd_media' => 'required|max:10000',
            'ld_media' => 'required|max:100',
            'free_nft' => 'required'
            // 'email' => ['required', 'email', 'not_in:' . auth()->user()->email],
        ];
    }
    
    public function userConnected()
    {
        $this->auth_user = Auth::user();
    }

    public function userDisconnected()
    {
        $this->auth_user = null;
    }

    public function mount($smart_contract_id = null)
    {
        $this->base_url = config('app.url');
        $this->auth_user = Auth::user();

        if (!is_null($smart_contract_id) && $this->auth_user) {
            $this->smart_contract = SmartContract::where('public_id', $smart_contract_id)->first();

            if (is_null($this->smart_contract)) {
                return redirect()->route('deploy');
            }

            $this->public_id = $this->smart_contract->public_id;
            $this->deployed = $this->smart_contract->deployed;

            // Blockchain & Smart Contract
            $this->network = $this->smart_contract->network;
            $this->name = $this->smart_contract->name;
            $this->symbol = $this->smart_contract->symbol;
            $this->description = $this->smart_contract->description;

            // Artwork
            $this->artwork_title = $this->smart_contract->artwork_title;
            $this->artwork_description = $this->smart_contract->artwork_description;
            $this->artwork_max_supply = $this->smart_contract->artwork_max_supply;
            $this->artwork_price = $this->smart_contract->artwork_price;
            $this->artwork_royalty = $this->smart_contract->artwork_royalty;
            $this->free_nft = $this->smart_contract->free_nft;

            // Mint page
            $this->artist_portfolio_link = $this->smart_contract->artist_portfolio_link;
            $this->artist_twitter_link = $this->smart_contract->artist_twitter_link;
            $this->artist_contact_mail = $this->smart_contract->artist_contact_mail;
        } else if ($this->auth_user) {
            $this->artist_portfolio_link = $this->auth_user->portfolio_link;
            $this->artist_twitter_link = $this->auth_user->twitter_link;
            $this->artist_contact_mail = $this->auth_user->contact_mail;
            $this->artist_name = $this->auth_user->name;
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
                [ 'user_id' => $this->auth_user->id ])
        );
    }

    public function updatedHdMedia()
    {
        $format = explode('/', $this->hd_media->getMimeType())[1];

        // $this->hd_media->storeAs('nft_media', $this->public_id.'_hd.'.$format);
        $path = $this->hd_media->storePubliclyAs(
            'nft_media',
            $this->public_id.'_hd.'.$format,
            'public'
        );

        $this->sha_hash = hash_file('sha256', Storage::url($path));

        $this->smart_contract->artwork_hd_media_path = Storage::url($path);
        $this->smart_contract->artwork_hd_media_type = $this->hd_media->getMimeType();
        $this->smart_contract->save();
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->smart_contract = SmartContract::updateOrCreate(
            [ 'public_id' => $this->public_id ], array_merge(
                $validatedData,
                [ 'user_id' => $this->auth_user->id ])
        );

        $this->startUploadIpfs();
    }

    public function startUploadIpfs()
    {
        // 1
        $this->state = 'Uploading media on IPFS...';

        $this->ipfs_hash = $this->uploadIpfs(
            $this->hd_media->getRealPath(),
            $this->hd_media->getMimeType(),
            $this->public_id.'_hd'
        );

        $this->smart_contract->ipfs_hash = $this->ipfs_hash;
        $this->smart_contract->save();

        if (empty($this->ipfs_hash)) {
            dd('error on uploading IPFS');
        }
        
        $this->readyToUploadArweave();
    }

    public function readyToUploadArweave()
    {
        // 2
        $this->state = 'Uploading media on Arweave...';

        $this->arweave_key = Storage::disk('local')->get('hW-arweave.json');

        $this->emit('uploadArweave', $this->hd_media->getMimeType());
        // Run on JS side.
    }

    public function arweaveUploaded()
    {
        $this->smart_contract->arweave_hash = $this->arweave_hash;
        $this->smart_contract->save();

        if (empty($this->arweave_hash)) {
            dd('error on uploading Arweave');
        }

        $this->createAndUploadJsonIpfs();
    }

    public function createAndUploadJsonIpfs()
    {
        $this->state = 'Uploading JSON to IPFS...';

        $data = [
            "name" => $this->artwork_title,
            "collection" => $this->name,
            "description" => $this->artwork_description,
            "image" => "https://gateway.pinata.cloud/ipfs/".$this->ipfs_hash,
            "image_arweave" => "http://arweave.net/".$this->arweave_hash,
            "image_ipfs" => "https://gateway.pinata.cloud/ipfs/".$this->ipfs_hash,
            "image_sha256" => $this->sha_hash,
        ];
        
        file_put_contents('storage/jsons/'.$this->public_id.'.json', json_encode($data));
            
        $this->ipfs_json_hash = $this->uploadIpfs(
            Storage::url('jsons/'.$this->public_id.'.json'),
            'application/json',
            $this->public_id
        );

        $this->smart_contract->ipfs_json_hash = $this->ipfs_json_hash;
        $this->smart_contract->save();

        if (empty($this->ipfs_hash)) {
            dd('error on uploading IPFS');
        }

        $this->readyToDeploySmartContract();
    }

    public function readyToDeploySmartContract()
    {
        // 3
        $this->state = 'Creating smart contract...';

        $this->abi = config("contracts.artist.abi");
        $this->byte = config("contracts.artist.byte");

        $this->createJsonContract();

        $this->emit('deploySmartContract');
        // Run on JS side.
    }

    public function smartContractDeployed($address)
    {
        $this->smart_contract->deployed = true;
        $this->smart_contract->address = $address;
        $this->smart_contract->save();

        if (empty($this->address)) {
            dd('error on deploying contract');
        }
    }

    //////////////

    public function createJsonContract()
    {
        $contract_data = [
            "name" => $this->name,
            "description" => $this->description,
            "image" => config('app.url').Storage::url('nft_media/'.$this->public_id.'_hd.png'),
            "external_link" => config('app.url').Storage::url('nft_media/'.$this->public_id.'_hd.png'),
            "seller_fee_basis_points" => 100, # Indicates a 1% seller fee.
            "fee_recipient" => $this->auth_address
        ];
        
        if (file_put_contents('storage/jsons/'.$this->public_id.'_contract.json', json_encode($contract_data))) {
            $this->contract_data_json = Storage::url('jsons/'.$this->public_id.'_contract.json');
            $this->smart_contract->contract_data_json = Storage::url('jsons/'.$this->public_id.'_contract.json');
            $this->smart_contract->save();
        } else {
            dd('Error on creating contract json');
        }
    }
    
    public function uploadIpfs($path, $type, $name)
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
