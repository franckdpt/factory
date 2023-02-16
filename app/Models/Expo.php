<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Expo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => [
                'name' => $value,
                'slug' => Str::slug($value, '-')
            ],
        );
    }

    public function artists()
    {
        return $this->belongsToMany(User::class);
    }

    public function smart_contracts()
    {
        return $this->hasMany(SmartContract::class);
    }
}
