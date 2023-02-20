<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class SmartContract extends Model
{
    use HasFactory;
    use Searchable;

    const IPFS_GATEWAY = "https://gateway.pinata.cloud/ipfs/";
    const ARWEAVE_GATEWAY = "https://arweave.net/";

    protected $fillable = [
        'public_id',
        'user_id',
        'expo_id',
        'network_id',

        'artwork_title',
        'artwork_description',
        'artwork_path',
        'artwork_hd_extension',
        'artwork_max_supply',
        'artwork_price',
        'artwork_royalty',

        'artist_portfolio_link',
        'artist_twitter_link',
        'artist_contact_mail',

        'artwork_ipfs_hash',
        'token_ipfs_hash',
        'artwork_arweave_hash',
        'artwork_sha_hash',
        'status',
        'address',
        'deployed',
        'open_sales',
        'self_nfts_number',
    ];

    protected $casts = [
        'network_id' => 'integer',
        'deployed' => 'boolean',
        'open_sales' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'public_id';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expo()
    {
        return $this->belongsTo(Expo::class);
    }

    public function network()
    {
        return $this->belongsTo(Network::class);
    }

    public function inReview(): string
    {
        return $this->status == "in_review";
    }

    public function inEditing(): string
    {
        return $this->status == "in_editing";
    }

    public function readyToDeploy(): string
    {
        return $this->status == "ready_to_deploy";
    }

    public function getContractUrl(): string
    {
        return config('app.url').'/storage/jsons/'.$this->public_id.'_contract.';
    }

    public function getArtworkUrl(): string
    {
        return config('app.url').'/storage/nft_media/'.$this->public_id.'_hd.'.$this->artwork_hd_extension;
    }

    public function getTokenIpfsUrl(): string
    {
        return self::IPFS_GATEWAY.$this->token_ipfs_hash;
    }

    public function getArtworkIpfsUrl(): string
    {
        return self::IPFS_GATEWAY.$this->artwork_ipfs_hash;
    }

    public function getArtworkArweaveUrl(): string
    {
        return self::ARWEAVE_GATEWAY.$this->artwork_arweave_hash;
    }

    public static function generatePublicId(int $length = 8): string
    {
        $public_id = Str::random($length);
        $exists = self::wherePublicId($public_id)->first();
        if (isset($exists)) {
            return self::generatePublicId();
        }

        return $public_id;
    }
}
