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

class SmartContractResource extends Resource
{
    protected static ?string $model = SmartContract::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('network')
                    ->maxLength(255),
                Forms\Components\Toggle::make('free_nft')
                    ->required(),
                Forms\Components\TextInput::make('artwork_title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('artwork_description')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('artwork_hd_extension')
                    ->maxLength(255),
                Forms\Components\TextInput::make('artwork_max_supply'),
                Forms\Components\TextInput::make('artwork_price'),
                Forms\Components\TextInput::make('artwork_royalty'),
                Forms\Components\TextInput::make('ipfs_hash')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ipfs_json_hash')
                    ->maxLength(255),
                Forms\Components\TextInput::make('arweave_hash')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sha_hash')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('artwork_title'),
                Tables\Columns\TextColumn::make('artwork_price'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\IconColumn::make('deployed')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
