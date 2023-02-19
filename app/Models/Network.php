<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'public_id',
    ];

    public function smart_contracts()
    {
        return $this->hasMany(SmartContract::class);
    }
}
