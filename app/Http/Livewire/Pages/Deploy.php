<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SmartContract;

class Deploy extends Component
{
    use WithFileUploads;

    public $smart_contract_id;

    public $current_step = 1;

    // 1.
    public $collection_name, $collection_description;

    // 2.
    public $max_supply, $price;

    // 3.
    public $royalty_percent;

    // Output data
    public $ipfs_uri;
    public $arweave_uri;
    public $hash_proof;

    // Smart contract data
    public $abi, $byte;

    public $media;
    public $media_name;
    public $media_type;
    public $media_path;

    public $files = [];

    public function render()
    {
        return view('livewire.pages.deploy')
                ->layout('layouts.app');
    }

    public function mount($smart_contract_id = null)
    {
        if ($smart_contract_id) {
            $smart_contract = SmartContract::where('public_id', $smart_contract_id)->firstOrFail();

            // --------- 👇 Refactor with middleware ----
            if (Auth::guest()) {
                abort(404); // not logged but url specified : need to login
            } else if ($smart_contract->user_id != Auth::user()->id) {
                abort(404); // not owner
            }
            // --------- 👆 Refactor with middleware ----

            $this->collection_name = $smart_contract->collection_name;
            $this->collection_description = $smart_contract->collection_description;

            $this->max_supply = $smart_contract->max_supply;
            $this->price = $smart_contract->price;

            $this->royalty_percent = $smart_contract->royalty_percent;

            $this->current_step = $smart_contract->step;
        }

        $this->abi = config("contracts.artist.abi");
        $this->byte = config("contracts.artist.byte");
    }
 
    public function submit()
    {
        $validatedData = $this->validate([
            'collection_name' => 'required|min:6',
            'collection_description' => 'required|max:10',
        ]);

        // if ($this->smart_contract_id) {
        //     $smart_contract = SmartContract::where('public_id', $this->smart_contract_id)->firstOrFail();
        //     $smart_contract->collection_name = $validatedData['collection_name'];
        //     $smart_contract->collection_description = $validatedData['collection_description'];
        //     if ($smart_contract->step < 2) {
        //         $smart_contract->step = 2;
        //     }
        //     $smart_contract->save();
        // } else {
        //     $smart_contract = SmartContract::create([
        //         'public_id' => SmartContract::generatePublicId(),
        //         'collection_name' => $validatedData['collection_name'],
        //         'collection_description' => $validatedData['collection_description'],
        //         'step' => 2,
        //     ]);
        //     $this->smart_contract_id = $smart_contract->public_id;
        // }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'collection_name' => 'min:6',
            'collection_description' => 'max:10',

            'max_supply' => 'numeric',
            'price' => 'numeric',

            'royalty_percent' => 'numeric',
        ]);
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
}
