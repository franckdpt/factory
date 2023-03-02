<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Validation\Validator;
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
    public $auth_address;
    public $networks;
    public $network_rates;

    public $abi, $byte, $arweave_key;
    public $hd_media, $state;
    public $wallet;
    public $in_editing = true;
    public $in_uploading = false;
    public $wallet_allowed = false;
    public $refresh_preview = false;
    public $deployments_limit_reached = false;
    public $artwork_royalty_input;
    public $client_network_id;
    
    public $smart_contract_name;
    public $smart_contract_symbol;
    public $factory_address;

    // SmartContract object
    public $public_id = null;
    public $network_id;
    public $network_public_id;
    
    public $artwork_artist;
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
    public $self_nfts_number;

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

            'artwork_artist' => 'required|string|max:50',
            'artwork_title' => 'required|string|max:50',
            'artwork_description' => 'required|string|max:300',
            'artwork_max_supply' => 'required',
            'artwork_price' => 'required|numeric|gt:0',
            'artwork_path' => 'required|string',
            'artwork_royalty_input' => 'required|numeric|max:10',

            'artist_portfolio_link' => 'nullable|url',
            'artist_twitter_link' => 'nullable|url',
            'artist_contact_mail' => 'nullable|email',

            'self_nfts_number' => 'required',
        ];
    }

    public function mount($expo, $smart_contract = null)
    {
        $this->networks = Network::all();

        $this->network_rates = Network::getEurConversions();

        $this->expo = $expo;
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
            $this->in_uploading = $this->smart_contract->inUploading();

            $this->public_id = $this->smart_contract->public_id;
            $this->network_id = $this->smart_contract->network_id;

            if ($this->smart_contract->network_id) {
                $this->network_public_id = Network::ID[$this->smart_contract->network->public_id][env('BLOCKCHAIN_ENV')];
            }
            
            $this->artwork_artist = $this->smart_contract->artwork_artist;
            $this->artwork_title = $this->smart_contract->artwork_title;
            $this->artwork_description = $this->smart_contract->artwork_description;
            $this->artwork_path = $this->smart_contract->artwork_path;
            $this->artwork_hd_extension = $this->smart_contract->artwork_hd_extension;
            $this->artwork_max_supply = $this->smart_contract->artwork_max_supply;
            $this->artwork_price = $this->smart_contract->artwork_price;
            $this->artwork_royalty = $this->smart_contract->artwork_royalty;
            
            $this->artist_portfolio_link = $this->smart_contract->artist_portfolio_link ? : Auth::user()->portfolio_link;
            $this->artist_twitter_link = $this->smart_contract->artist_twitter_link ? : Auth::user()->twitter_link;
            $this->artist_contact_mail = $this->smart_contract->artist_contact_mail ? : Auth::user()->contact_mail;

            $this->artwork_ipfs_hash = $this->smart_contract->artwork_ipfs_hash;
            $this->token_ipfs_hash = $this->smart_contract->token_ipfs_hash;
            $this->artwork_arweave_hash = $this->smart_contract->artwork_arweave_hash;
            $this->artwork_sha_hash = $this->smart_contract->artwork_sha_hash;
            $this->address = $this->smart_contract->address;
            $this->deployed = $this->smart_contract->deployed;
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

    public function userChangedNetwork($id)
    {
        $this->client_network_id = $id;
    }

    public function updatedArtistPortfolioLink()
    {
        $user = Auth::user();
        $user->portfolio_link = $this->smart_contract->artist_portfolio_link;
        $user->save();
    }

    public function updatedArtistTwitterLink()
    {
        $user = Auth::user();
        $user->twitter_link = $this->smart_contract->artist_twitter_link;
        $user->save();
    }

    public function updatedArtistContactMail()
    {
        $user = Auth::user();
        $user->contact_mail = $this->smart_contract->artist_contact_mail;
        $user->save();
    }

    public function updatedArtworkMaxSupply()
    {
        $this->checkSupplyAndSelf();
    }

    public function updatedSelfNftsNumber()
    {
        $this->checkSupplyAndSelf();
    }

    private function checkSupplyAndSelf()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if ($this->self_nfts_number > $this->maxSelf()) {
                    if ($this->maxSelf() == 0) {
                        $validator->errors()->add('self_nfts_number', 'Max supply too low to reserve NFT for you.');
                    } else {
                        $validator->errors()->add('self_nfts_number', 'Maximum of '.$this->maxSelf().' with this max supply.');
                    }
                }
            });
        })->validate([
            'self_nfts_number' => 'required|integer',
            'artwork_max_supply' => 'required|integer|min:1',
        ]);

        $this->smart_contract->artwork_max_supply = $this->artwork_max_supply;
        $this->smart_contract->self_nfts_number = $this->self_nfts_number;
        $this->smart_contract->save();
    }

    private function maxSelf()
    {
        if ($this->artwork_max_supply == 1) {
            return 0;
        } else if ($this->artwork_max_supply <= 10) {
            return 1;
        } else if ($this->artwork_max_supply <= 20) {
            return 2;
        } else {
            return 5;
        }
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
            'hd_media' => 'nullable|max:102400|mimes:jpg,mp4',
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
        if ($this->in_editing || $this->in_uploading) {
            $validatedData = $this->validate();

            $this->smart_contract = SmartContract::updateOrCreate(
                [ 'public_id' => $this->public_id ],
                $validatedData
            );

            $this->wallet = Auth::user()->wallet_address;

            if ($this->in_uploading) {
                // keep going uploading
                if (!$this->smart_contract->isArtworkIpfsDone()) {
                    $this->state = 'Uploading media on IPFS...';
                    $this->emit('readyToUploadIpfs');
                } else if (!$this->smart_contract->isArtworkArweaveDone()) {
                    $this->state = 'Uploading media on Arweave...';
                    $this->emit('readyToUploadArweave');
                } else if (!$this->smart_contract->isTokenIpfsDone()) {
                    $this->state = 'Creating & uploading JSON to IPFS...';
                    $this->emit('readyToCreateAndUploadJsonTokenIpfs');
                } else {
                    dd('Unexpected error, contact dev.');
                }
            } else {
                // start uploading
                $this->in_uploading = true;
                $this->smart_contract->status = 'in_uploading';
                $this->smart_contract->save();

                $this->state = 'Uploading media on IPFS...';
                $this->emit('readyToUploadIpfs');
            }
        } else if ($this->smart_contract->inReview()) {
            // nothing
        } else if ($this->smart_contract->readyToDeploy()) {
            if ($this->client_network_id != $this->network_public_id) {
                $this->emit('switchNetworkOnJs', $this->network_public_id);
            } else {
                $this->smart_contract->status = 'in_deploying';
                $this->smart_contract->save();
                $this->emit('readyToDeploySmartContract');
            }
        }
    }

    private function getNetworkPublicId()
    {

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
        $this->abi = json_decode(Storage::disk('local')->get('sc-721-1.json'), true)['abi'];
        $this->byte = json_decode(Storage::disk('local')->get('sc-721-1.json'), true)['bytecode'];

        $this->smart_contract_symbol = $this->smart_contract->getContractSymbol();
        $this->smart_contract_name = $this->smart_contract->getContractName();
        
        $this->auth_address = Auth::user()->wallet_address;

        // Next on JS side.
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

        $this->smart_contract->status = 'deployed';
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
            "collection" => $this->smart_contract->getContractName(),
            "description" => $this->artwork_description
        ];

        if ($this->smart_contract->isVideo()) {
            $data["image"] = "";
            $data["animation_url"] = $this->smart_contract->getArtworkIpfsUrl();
            $data["video_arweave"] = $this->smart_contract->getArtworkArweaveUrl();
            $data["video_ipfs"] = $this->smart_contract->getArtworkIpfsUrl();
            $data["video_sha256"] = $this->artwork_sha_hash;
        } else if ($this->smart_contract->isImage()) {
            $data["image"] = $this->smart_contract->getArtworkIpfsUrl();
            $data["image_arweave"] = $this->smart_contract->getArtworkArweaveUrl();
            $data["image_ipfs"] = $this->smart_contract->getArtworkIpfsUrl();
            $data["image_sha256"] = $this->artwork_sha_hash;
        }

        if (file_put_contents('storage/jsons/'.$this->public_id.'.json', json_encode($data))) {
            
        } else {
            dd('Error on creating token json');
        }
    }

    public function createJsonContract()
    {
        $contract_data = [
            "name" => $this->smart_contract->getContractName(),
            "description" => $this->expo->contracts_description,
            "image" => "https://mint.nftfactoryparis.com/storage/logo_collection.jpg",
            "external_link" => route('mint', [
                'expo' => $this->expo,
                'smart_contract_publicid' => $this->public_id,
            ]),
            "seller_fee_basis_points" => $this->smart_contract->artwork_royalty,
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
            return env('LOCAL_PATH').
                    $this->smart_contract->public_id.
                    '_hd.'.
                    $this->smart_contract->artwork_hd_extension;
        } else {
            return $this->smart_contract->getArtworkUrl();
        }
    }
}
