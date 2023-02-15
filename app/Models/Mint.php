<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mint extends Model
{
    use HasFactory;

    protected $fillable = [
        'smart_contract_id',
        'user_id',

        'success',
        'token_id',
    ];

    protected $casts = [
        'success' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function smart_contract()
    {
        return $this->belongsTo('App\Models\SmartContract');
    }
}
