<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
