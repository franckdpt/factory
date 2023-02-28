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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class SmartContractResource extends Resource
{
    protected static ?string $model = SmartContract::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Editions';

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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Artist')->sortable(),
                Tables\Columns\TextColumn::make('artwork_title'),
                Tables\Columns\TextColumn::make('artwork_hd_extension')->label('type')->sortable(),
                Tables\Columns\TextColumn::make('artwork_price'),
                Tables\Columns\TextColumn::make('status')->sortable(),
                Tables\Columns\IconColumn::make('deployed')->boolean()->sortable(),
            ])
            ->filters([
                SelectFilter::make('artwork_hd_extension')
                    ->label('type')
                    ->options([
                        'mp4' => 'MP4',
                        'jpeg' => 'JPG',
                    ]),
                Filter::make('deployed')
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSmartContracts::route('/'),
            // 'create' => Pages\CreateSmartContract::route('/create'),
            'view' => Pages\ViewSmartContract::route('/{record}'),
            // 'edit' => Pages\EditSmartContract::route('/{record}/edit'),
        ];
    }
}
