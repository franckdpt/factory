<?php

namespace App\Filament\Resources\SmartContractResource\Pages;

use App\Filament\Resources\SmartContractResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\SmartContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ListSmartContracts extends ListRecords
{
    protected static string $resource = SmartContractResource::class;

    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $q = DB::table('smart_contracts')
            ->join('users', 'smart_contracts.user_id', '=', 'users.id')
            ->select('*')
            ->where(function($query) use ($searchQuery) {
                $query->where('smart_contracts.address', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('smart_contracts.artwork_title', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('users.wallet_address', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('users.name', 'LIKE', '%' . $searchQuery . '%');
            })
            ->orderBy('smart_contracts.id', 'desc')
            ->get();

            $query->whereIn('public_id', $q->pluck('public_id'));
        }
    
        return $query;
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
