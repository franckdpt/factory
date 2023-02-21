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
    public $networks;

    public $abi, $byte, $arweave_key;
    public $hd_media, $state;
    public $wallet;
    public $in_editing = true;
    public $wallet_allowed = false;
    public $refresh_preview = false;
    public $deployments_limit_reached = false;
    public $artwork_royalty_input;
    
    public $expo_name;
    public $expo_symbol;
    public $factory_address;

    // SmartContract object
    public $public_id = null;
    public $network_id;
    
    public $artwork_title;
    public $artwork_description;
    public $artwork_path = null;
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
            
            'network_id' => 'required|integer',

            'artwork_title' => 'required|string|max:25',
            'artwork_description' => 'required|string|max:420',
            'artwork_max_supply' => 'required|integer|min:2|max:100',
            'artwork_price' => 'required|numeric|gt:0',
            'artwork_royalty_input' => 'required|numeric|max:10',
            'artwork_path' => 'required|string',

            'artist_portfolio_link' => 'nullable|url',
            'artist_twitter_link' => 'nullable|url',
            'artist_contact_mail' => 'nullable|email',

            'open_sales' => 'required|boolean',
            'self_nfts_number' => 'required|integer|lt:artwork_max_supply',
        ];
    }

    public function mount($expo, $smart_contract = null)
    {
        $this->networks = Network::all();

        $this->expo = $expo;
        $this->expo_name = $expo->name;
        $this->expo_symbol = $expo->symbol;
        $this->factory_address = $expo->factory_address;

        $this->isWalletAllowed();
        
        if (is_null($smart_contract)) {
            $this->maybeRedirectToEdit();
        } else {
            if (Auth::guest() || $smart_contract->expo_id != $this->expo->id) {
                abort(404);
            } else if ($smart_contract->user_id != Auth::user()->id) {
                return redirect()->route('deploy', ['expo' => $this->expo]);
            }

            $this->smart_contract = $smart_contract;
            // dd($this->smart_contract->getRoyaltyInput());
            $this->artwork_royalty_input = $this->smart_contract->getRoyaltyInput();

            $this->in_editing = $this->smart_contract->inEditing();

            $this->public_id = $this->smart_contract->public_id;
            $this->network_id = $this->smart_contract->network_id;
            
            $this->artwork_title = $this->smart_contract->artwork_title;
            $this->artwork_description = $this->smart_contract->artwork_description;
            $this->artwork_path = $this->smart_contract->artwork_path;
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
        $this->isWalletAllowed();

        if (is_null($this->smart_contract)) {
            $this->maybeRedirectToEdit();
        } else {
            if ($this->smart_contract->user_id != Auth::user()->id) {
                return redirect()->route('deploy', ['expo' => $this->expo]);
            }
        }
    }

    public function updated($propertyName)
    {
        if ($this->in_editing) {
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

    public function updatedArtworkMaxSupply()
    {
        $this->validateOnly('self_nfts_number');
    }

    public function updatedArtworkRoyaltyInput()
    {
        $this->smart_contract->artwork_royalty = $this->artwork_royalty_input*100;
        $this->smart_contract->save();
    }

    public function updatedHdMedia()
    {
        $this->refresh_preview = false;
        $this->validate([
            'hd_media' => 'nullable|max:100000|mimes:jpg,mp4',
        ]);
        $this->refresh_preview = true;

        if ($this->in_editing) {
            $this->artwork_hd_extension = explode('/', $this->hd_media->getMimeType())[1];

            // $this->hd_media->storeAs('nft_media', $this->public_id.'_hd.'.$this->artwork_hd_extension);
            $this->hd_media->storePubliclyAs(
                'nft_media',
                $this->public_id.'_hd.'.$this->artwork_hd_extension,
                'public'
            );

            $this->artwork_sha_hash = hash_file('sha256', public_path('storage/nft_media/'.$this->public_id.'_hd.'.$this->artwork_hd_extension));
            $this->artwork_path = '/storage/nft_media/'.$this->public_id.'_hd.'.$this->artwork_hd_extension;

            $this->smart_contract->artwork_sha_hash = $this->artwork_sha_hash;
            $this->smart_contract->artwork_hd_extension = $this->artwork_hd_extension;
            $this->smart_contract->artwork_hd_mime = $this->hd_media->getMimeType();
            $this->smart_contract->artwork_path = $this->artwork_path;
            $this->smart_contract->save();
        }
    }

    public function submit()
    {
        if ($this->in_editing) {
            $validatedData = $this->validate();

            $this->smart_contract = SmartContract::updateOrCreate(
                [ 'public_id' => $this->public_id ],
                $validatedData
            );

            $this->wallet = Auth::user()->wallet_address;
            $this->state = 'Uploading media on IPFS...';
            $this->emit('readyToUploadIpfs');

        } else if ($this->smart_contract->inReview()) {
            // nothing
        } else if ($this->smart_contract->readyToDeploy()) {
            $this->emit('readyToDeploySmartContract');
        }
    }

    public function readyToUploadIpfs()
    {
        
        $this->artwork_ipfs_hash = $this->uploadFileToIpfs(
            $this->getArtworkUrlForIpfsUpload(),
            $this->smart_contract->artwork_hd_mime,
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
        $base64 = base64_encode(file_get_contents($this->getArtworkUrlForIpfsUpload()));

        // Next on JS side.
        $this->emit('uploadArweaveOnJs', $this->smart_contract->artwork_hd_mime, $base64);
    }

    public function arweaveUploaded()
    {
        $this->smart_contract->artwork_arweave_hash = $this->artwork_arweave_hash;
        $this->smart_contract->save();

        if (empty($this->artwork_arweave_hash)) {
            dd('error on uploading Arweave');
        }

        // Next
        $this->state = 'Creating & uploading JSON to IPFS...';
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

        $this->createJsonContract();

        $this->smart_contract->status = 'in_review';
        $this->smart_contract->save();

        return redirect(request()->header('Referer'));
    }

    public function readyToDeploySmartContract()
    {
        $this->abi = config("contracts.artist.abi");
        $this->byte = config("contracts.artist.byte");

        // Next on JS side.
        $this->state = 'Deploying smart contract...';
        $this->emit('deploySmartContractOnJs',
            $this->smart_contract->getTokenIpfsUrl(),
            $this->smart_contract->getArtworkIpfsUrl(),
            $this->smart_contract->getArtworkArweaveUrl(),
            $this->smart_contract->getContractUrl(),
        );
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

        return redirect()->route('mint', [
            'expo' => $this->expo,
            'smart_contract_publicid' => $this->public_id,
        ]);
    }

    //////////////

    public function createJsonToken()
    {
        $data = [
            "name" => $this->artwork_title,
            "collection" => $this->expo->contracts_name,
            "description" => $this->artwork_description,
            "image" => $this->smart_contract->getArtworkIpfsUrl(),
            "image_arweave" => $this->smart_contract->getArtworkArweaveUrl(),
            "image_ipfs" => $this->smart_contract->getArtworkIpfsUrl(),
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
            "image" => $this->smart_contract->getArtworkUrl(),
            "external_link" => $this->smart_contract->getArtworkUrl(),
            "seller_fee_basis_points" => 100, # Indicates a 1% seller fee.
            "fee_recipient" => Auth::user()->wallet_address
        ];
        
        if (file_put_contents('storage/jsons/'.$this->public_id.'_contract.json', json_encode($contract_data))) {
            
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
        if ($this->wallet_allowed) {
            $nb_deployment_done = Auth::user()->smart_contracts()
                        ->where('deployed', true)
                        ->where('expo_id', $this->expo->id)
                        ->count();
            if ($nb_deployment_done >= $this->expo->nb_deployment_authorized) {
                $this->deployments_limit_reached = true;
            } else {
                $this->deployments_limit_reached = false;
                
                $undeployed_constract = Auth::user()->smart_contracts()
                        ->where('deployed', false)
                        ->where('expo_id', $this->expo->id)
                        ->first();
                        
                if ($undeployed_constract) {
                    return redirect()->route('continue_deploy', [
                        'expo' => $this->expo,
                        'smart_contract' => $undeployed_constract,
                    ]);
                }
            }
        }
    }
    private function isWalletAllowed()
    {
        if (Auth::check()) {
            $this->wallet_allowed = $this->expo->artists->contains(Auth::user());
        } else {
            $this->wallet_allowed = false;
        }
    }

    private function getArtworkUrlForIpfsUpload()
    {
        if (env('APP_ENV') == 'local') {
            return '/Users/franckdupont/Valet/factory/storage/app/public/nft_media/'.
                    $this->smart_contract->public_id.
                    '_hd.'.
                    $this->smart_contract->artwork_hd_extension;
        } else {
            return $this->smart_contract->getArtworkUrl();
        }
    }
}
