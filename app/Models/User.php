<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Laravel\Scout\Searchable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'admin',
        'eth_ens',
        'wallet_address',

        'portfolio_link',
        'twitter_link',
        'contact_mail',

        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean'
    ];

    public function toSearchableArray()
    {
        return [
            'name' => '',
            'wallet_address' => '',
        ];
    }

    public function canAccessFilament(): bool
    {
        return $this->admin;
    }

    protected function ethAddress(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => [
                'wallet_address' => $value,
                'name' => $this->name ? : 'guest' // TODO: only whitelisted admin
            ],
        );
    }

    public function expos()
    {
        return $this->belongsToMany(Expo::class);
    }

    public function smart_contracts()
    {
        return $this->hasMany(SmartContract::class);
    }
}
