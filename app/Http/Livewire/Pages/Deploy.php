<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SmartContract;
use App\Models\User;
use App\Http\Livewire\Traits\WithNetworks;

class Deploy extends Component
{
    use WithFileUploads, WithNetworks;

    public ?User $auth_user = null;
    public ?SmartContract $smart_contract = null;
    
    public $public_id = null;
    public $deployed = false;

    // Blockchain & Smart Contract
    public $network = "ethereum";
    public $name = "";
    public $symbol = "";
    public $description = "";
    public $artist_name = "";

    // Artwork
    public $artwork_title = "";
    public $artwork_description = "";
    public $artwork_hd_media_path = "";
    public $artwork_ld_media_path = "";
    public $artwork_max_supply = null;
    public $artwork_price = null;
    public $artwork_royalty = null; //
    public $free_nft = false;

    // Mint page
    public $artist_portfolio_link = "";
    public $artist_twitter_link = "";
    public $artist_contact_mail = "";

    // OpenGem contract
    public $abi, $byte;

    // Output variables
    public $media;
    public $media_name;

    protected $listeners = [
        'userConnected',
        'userDisconnected',
    ];

    protected function rules()
    {
        return [
            'public_id' => 'required|string',
            
            'network' => 'required|string',
            'name' => 'required|string|max:25',
            'symbol' => 'required|string|max:5',
            'description' => 'required|string|max:420',
            'artist_name' => 'string',

            'artwork_title' => 'required|string|max:25',
            'artwork_description' => 'required|string|max:420',
            'artwork_hd_media_path' => 'required|string',
            'artwork_ld_media_path' => 'required|string',
            'artwork_max_supply' => 'required|numeric|min:1|max:100',
            'artwork_price' => 'required|numeric',
            'artwork_royalty' => 'required|numeric|max:10',

            'artist_portfolio_link' => 'url',
            'artist_twitter_link' => 'url',
            'artist_contact_mail' => 'email'
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
            $this->artwork_hd_media_path = $this->smart_contract->artwork_hd_media_path;
            $this->artwork_ld_media_path = $this->smart_contract->artwork_ld_media_path;
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

        $this->abi = config("contracts.artist.abi");
        $this->byte = config("contracts.artist.byte");
    }

    public function deploy()
    {
        $this->save();
        // deploy
    }
 
    public function save()
    {
        $validatedData = $this->validate();

        // TODO: display save button just if public_id is not null
        $this->smart_contract = SmartContract::updateOrCreate(
            [ 'public_id' => $this->public_id ], array_merge(
                $validatedData,
                [ 'user_id' => $this->auth_user->id ])
        );
    }

    public function updated($propertyName)
    {
        if (is_null($this->public_id)) {
            $this->public_id = SmartContract::generatePublicId();
        }
        // dd($propertyName);
        $this->validateOnly($propertyName);
    }

    // public function updatedMedia()
    // {
    //     $this->validate([
    //         'media' => 'max:100000', // 100MB Max
    //     ]);

    //     $this->media_type = $this->media->getMimeType();
    //     $this->media_path = $this->media->getRealPath();
    //     $this->media_name = $this->media->getClientOriginalName();
    // }

    // public function uploadIpfs()
    // {
    //     $curl = curl_init();
    //     $tmp = curl_setopt_array($curl, [
    //         CURLOPT_URL => "https://api.pinata.cloud/pinning/pinFileToIPFS",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_POST => 1,
    //         CURLOPT_POSTFIELDS => array('file' => curl_file_create($this->media_path, $this->media_type, $this->title)),
    //         CURLOPT_HTTPHEADER => [
    //             "pinata_api_key: ".env('PINATA_KEY'),
    //             "pinata_secret_api_key: ".env('PINATA_SECRET')
    //         ],
    //     ]);
    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);
    //     curl_close($curl);

    //     if ($err) {
    //         dd($err);
    //     } else {
    //         $this->ipfs_hash = json_decode($response)->IpfsHash;
    //     }
    // }

    public function render()
    {
        return view('livewire.pages.deploy')
                ->layout('layouts.app');
    }
}
