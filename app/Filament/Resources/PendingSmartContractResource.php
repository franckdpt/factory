<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmartContractResource\Pages;
use App\Filament\Resources\SmartContractResource\RelationManagers;
use App\Models\SmartContract;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;

class PendingSmartContractResource extends Resource
{
    protected static ?string $model = SmartContract::class;
 
    protected static ?string $navigationLabel = 'Editions in review';

    protected static ?string $navigationGroup = 'To do';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $slug = 'review-smart-contracts';

    protected static ?string $recordTitleAttribute = 'artwork_title';

    public static function getGloballySearchableAttributes(): array
    {
        return [ 'artwork_title', 'address', 'user.name'];
    }

    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Owner' => $record->user->name,
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereStatus('in_review');
    }

    protected static function getNavigationBadgeColor(): ?string
    {
        return static::$model::where('status', 'in_review')->count() > 0 ? 'danger' : 'primary';
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::where('status', 'in_review')->count();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('artwork_title'),
                Tables\Columns\TextColumn::make('artwork_price'),
                Tables\Columns\TextColumn::make('user.name')->label('Owner'),
            ])
            ->filters([
                //
            ])
            ->actions([
                
            ])
            ->bulkActions([
                
            ])->poll('5s');
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendingSmartContracts::route('/'),
            'view' => Pages\ViewPendingSmartContract::route('/{record}'),
        ];
    }    
}
