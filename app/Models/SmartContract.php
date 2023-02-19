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

    protected $fillable = [
        'public_id',
        'user_id',
        'expo_id',
        'network_id',

        'free_nft',

        'artwork_title',
        'artwork_description',
        'artwork_hd_extension',
        'artwork_max_supply',
        'artwork_price',
        'artwork_royalty',

        'artist_portfolio_link',
        'artist_twitter_link',
        'artist_contact_mail',

        'ipfs_hash',
        'ipfs_json_hash',
        'arweave_hash',
        'sha_hash',
        'status',
        'address',
        'deployed',
    ];

    protected $casts = [
        'network_id' => 'integer',
        'free_nft' => 'boolean',
        'deployed' => 'boolean',
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
