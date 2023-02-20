<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Traits\AuthRefreshed;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Expo;
use App\Models\SmartContract;
use App\Models\Network;

class Deploy extends Component
{
    use WithFileUploads, AuthRefreshed;

    // Livewire variables
    public ?SmartContract $smart_contract = null;
    public Expo $expo;
    public $abi, $byte, $arweave_key;
    public $hd_media, $contract_data_json_url, $state;
    public $wallet;
    public $disabled = false;
    public $allowed = false;

    public $expo_name;
    public $expo_symbol;
    public $artwork_ipfs_url;
    public $token_ipfs_url;
    public $artwork_arweave_url;

    // SmartContract object
    public $public_id = null;

    public $networks;
    public $network_id;
    
    public $artwork_title;
    public $artwork_description;
    public $artwork_hd_extension;
    public $artwork_max_supply = null;
    public $artwork_price = null;
    public $artwork_royalty = null;
    
    public $artist_portfolio_link;
    public $artist_twitter_link;
    public $artist_contact_mail;
    
    public $artwork_ipfs_hash;
    public $token_ipfs_hash;
    public $artwork_arweave_hash;
    public $artwork_sha_hash;
    public $address;
    public $deployed = false;
    public $open_sales = true;
    public $self_nfts_number = 0;

    protected $listeners = [
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
            
            'network_id' => 'required|numeric',

            'artwork_title' => 'required|string|max:25',
            'artwork_description' => 'required|string|max:420',
            'artwork_max_supply' => 'required|numeric|min:1|max:100',
            'artwork_price' => 'required|numeric',
            'artwork_royalty' => 'required|numeric|max:10',

            'artist_portfolio_link' => 'nullable|url',
            'artist_twitter_link' => 'nullable|url',
            'artist_contact_mail' => 'nullable|email',

            'hd_media' => 'required|max:10000',
            'open_sales' => 'required|numeric',
            'self_nfts_number' => 'required|numeric',
        ];
    }

    public function mount($expo, $smart_contract = null)
    {
        $this->networks = Network::all();
        $this->expo = $expo;
        $this->expo_name = $expo->name;
        $this->expo_symbol = $expo->symbol;

        $this->walletAllowing();
        
        if (is_null($smart_contract)) {
            $this->maybeRedirectToEdit();
        } else {
            if (Auth::guest() ||
                $smart_contract->user_id != Auth::user()->id ||
                $smart_contract->expo_id != $this->expo->id ||
                $smart_contract->deployed
                ) {
                abort(404);
            }

            $this->smart_contract = $smart_contract;

            $this->disabled = $this->smart_contract->status == 'waiting_for_validation';

            $this->public_id = $this->smart_contract->public_id;
            
            $this->network_id = $this->smart_contract->network_id;
            
            $this->artwork_title = $this->smart_contract->artwork_title;
            $this->artwork_description = $this->smart_contract->artwork_description;
            $this->artwork_hd_extension = $this->smart_contract->artwork_hd_extension;
            $this->artwork_max_supply = $this->smart_contract->artwork_max_supply;
            $this->artwork_price = $this->smart_contract->artwork_price;
            $this->artwork_royalty = $this->smart_contract->artwork_royalty;
            
            $this->artist_portfolio_link = $this->smart_contract->artist_portfolio_link;
            $this->artist_twitter_link = $this->smart_contract->artist_twitter_link;
            $this->artist_contact_mail = $this->smart_contract->artist_contact_mail;

            $this->artwork_ipfs_hash = $this->smart_contract->artwork_ipfs_hash;
            $this->token_ipfs_hash = $this->smart_contract->token_ipfs_hash;
            $this->artwork_arweave_hash = $this->smart_contract->artwork_arweave_hash;
            $this->artwork_sha_hash = $this->smart_contract->artwork_sha_hash;
            $this->address = $this->smart_contract->address;
            $this->deployed = $this->smart_contract->deployed;
            $this->open_sales = $this->smart_contract->open_sales;
            $this->self_nfts_number = $this->smart_contract->self_nfts_number;
        }
    }
    
    public function userConnected()
    {
        $this->walletAllowing();

        if (is_null($this->smart_contract)) {
            $this->maybeRedirectToEdit();
        }

        if (!$this->disabled && $this->allowed) {
            if ($this->smart_contract && !$this->smart_contract->deployed) {
                $this->artist_portfolio_link = $this->smart_contract->artist_portfolio_link ? : Auth::user()->portfolio_link;
                $this->artist_twitter_link = $this->smart_contract->artist_twitter_link ? : Auth::user()->twitter_link;
                $this->artist_contact_mail = $this->smart_contract->artist_contact_mail ? : Auth::user()->contact_mail;

                $this->smart_contract->user_id = Auth::user()->id;
                $this->smart_contract->save();
            }
        }
    }

    public function updated($propertyName)
    {
        if (!$this->disabled) {
            if (is_null($this->public_id)) {
                $this->public_id = SmartContract::generatePublicId();
            }

            $validatedData = $this->validateOnly($propertyName);

            $this->smart_contract = SmartContract::updateOrCreate(
                [ 'public_id' => $this->public_id ], array_merge(
                    $validatedData,
                    [ 'user_id' => Auth::user()->id, 'expo_id' => $this->expo->id])
            );
        }
    }

    public function updatedHdMedia()
    {
        if (!$this->disabled) {
            $this->artwork_hd_extension = explode('/', $this->hd_media->getMimeType())[1];

            // $this->hd_media->storeAs('nft_media', $this->public_id.'_hd.'.$this->artwork_hd_extension);
            $this->hd_media->storePubliclyAs(
                'nft_media',
                $this->public_id.'_hd.'.$this->artwork_hd_extension,
                'public'
            );

            $this->artwork_sha_hash = hash_file('sha256', public_path('storage/nft_media/'.$this->public_id.'_hd.'.$this->artwork_hd_extension));

            $this->smart_contract->artwork_sha_hash = $this->artwork_sha_hash;
            $this->smart_contract->artwork_hd_extension = $this->artwork_hd_extension;
            $this->smart_contract->save();
        }
    }

    public function updatedTokenIpfsHash()
    {
        $this->token_ipfs_url = SmartContract::IPFS_GATEWAY.$this->token_ipfs_hash;
    }

    public function updatedArtworkIpfsHash()
    {
        $this->artwork_ipfs_url = SmartContract::IPFS_GATEWAY.$this->artwork_ipfs_hash;
    }

    public function updatedArtworkArweaveHash()
    {
        $this->artwork_arweave_url = SmartContract::ARWEAVE_GATEWAY.$this->artwork_arweave_hash;
    }

    public function submit()
    {
        if (!$this->disabled) {
            $validatedData = $this->validate();

            $this->smart_contract = SmartContract::updateOrCreate(
                [ 'public_id' => $this->public_id ], array_merge(
                    $validatedData,
                    [ 'status' => 'waiting_for_validation' ])
            );

            $this->state = 'Submitted!';

        } else if ($this->smart_contract->status == 'waiting_for_validation') {
            // nothing
        } else if ($this->smart_contract->status == 'ready_to_deploy') {
            $this->wallet = Auth::user()->wallet_address;
            $this->emit('readyToUploadIpfs');
        }
    }

    public function readyToUploadIpfs()
    {
        $this->artwork_ipfs_hash = $this->uploadFileToIpfs(
            $this->hd_media->getRealPath(),
            $this->hd_media->getMimeType(),
            $this->public_id.'_hd'
        );

        $this->smart_contract->artwork_ipfs_hash = $this->artwork_ipfs_hash;
        $this->smart_contract->save();

        if (empty($this->artwork_ipfs_hash)) {
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
        $this->smart_contract->artwork_arweave_hash = $this->artwork_arweave_hash;
        $this->smart_contract->save();

        if (empty($this->artwork_arweave_hash)) {
            dd('error on uploading Arweave');
        }

        // Next
        $this->state = 'Creating & uploading JSON token to IPFS...';
        $this->emit('readyToCreateAndUploadJsonTokenIpfs');
    }

    public function readyToCreateAndUploadJsonTokenIpfs()
    {
        $this->createJsonToken();
            
        $this->token_ipfs_hash = $this->uploadFileToIpfs(
            public_path('storage/jsons/'.$this->public_id.'.json'),
            'application/json',
            $this->public_id
        );

        $this->smart_contract->token_ipfs_hash = $this->token_ipfs_hash;
        $this->smart_contract->save();

        if (empty($this->artwork_ipfs_hash)) {
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
            "collection" => $this->expo->contracts_name,
            "description" => $this->artwork_description,
            "image" => $this->artwork_ipfs_url,
            "image_arweave" => $this->artwork_arweave_url,
            "image_ipfs" => $this->artwork_ipfs_url,
            "image_sha256" => $this->artwork_sha_hash,
        ];

        if (file_put_contents('storage/jsons/'.$this->public_id.'.json', json_encode($data))) {
            
        } else {
            dd('Error on creating token json');
        }
    }

    public function createJsonContract()
    {
        $contract_data = [
            "name" => $this->expo->contracts_name,
            "description" => $this->expo->contracts_description,
            "image" => public_path('storage/nft_media/'.$this->public_id.'_hd.'.$this->artwork_hd_extension),
            "external_link" => public_path('storage/nft_media/'.$this->public_id.'_hd.'.$this->artwork_hd_extension),
            "seller_fee_basis_points" => 100, # Indicates a 1% seller fee.
            "fee_recipient" => Auth::user()->wallet_address
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

    private function maybeRedirectToEdit()
    {
        $editing = (Auth::check() && $this->allowed) ? Auth::user()->smart_contracts()
                                                                ->where('status', 'editing')
                                                                ->where('expo_id', $this->expo->id)
                                                                ->first() : null;
        if ($editing) {
            return redirect()->route('continue_deploy', [
                'expo' => $this->expo,
                'smart_contract' => $editing,
            ]);
        }
    }
    private function walletAllowing()
    {
        if (Auth::check()) {
            $this->allowed = $this->expo->artists->contains(Auth::user());
        } else {
            $this->allowed = false;
        }
    }
}
