<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Network extends Model
{
    use HasFactory;

    const ID = [
        1 => [
            "main" => 1,
            "test" => 5,
        ],
        137 => [
            "main" => 137,
            "test" => 80001,
        ],
    ];

    protected $fillable = [
        'name',
        'public_id',
        'explorer',
        'currency',
    ];

    public function smart_contracts()
    {
        return $this->hasMany(SmartContract::class);
    }

    public static function getEurConversions()
    {
        $conversions = [];
        foreach (self::all() as $network) {
            $response = Http::get('https://api.coinbase.com/v2/exchange-rates?currency='.$network->currency);
            if ($response->successful()) {
                if ($response->json()['data'] && $response->json()['data']['rates'] && $response->json()['data']['rates']['EUR']) {
                    $conversions[$network->id] = $response->json()['data']['rates']['EUR'];
                }
            } else {
                $conversions[$network->id] = null;
            }
        }

        return $conversions;
    }
}
