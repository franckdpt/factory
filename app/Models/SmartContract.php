<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SmartContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'public_id',
        'user_id',

        'network',
        'name',
        'symbol',
        'description',
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
        'address',
        'deployed',
    ];

    protected $casts = [
        'free_nft' => 'boolean',
        'deployed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
