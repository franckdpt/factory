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

class SmartContractResource extends Resource
{
    protected static ?string $model = SmartContract::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Owner Info')->relationship('user')->schema([
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('name'),
                    ]),
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('wallet_address')
                    ])
                ]),

                Fieldset::make('Smart Contract Info')->schema([
                    Grid::make(4)->schema([
                        Forms\Components\Toggle::make('deployed'),
                        Forms\Components\Select::make('network')
                            ->relationship('network', 'name')
                    ]),
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('address')
                            ->label("Smart contract address"),
                    ]),
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('token_ipfs_hash')
                            ->label('TokenURI'),
                    ]),
                ]),
                
                Fieldset::make('Artwork Info')->schema([
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('artwork_title'),
                    ]),
                    Grid::make(2)->schema([
                        Forms\Components\Textarea::make('artwork_description'),
                    ]),
                    Grid::make(4)->schema([
                        Forms\Components\TextInput::make('artwork_hd_extension'),
                        Forms\Components\TextInput::make('artwork_max_supply'),
                    ]),
                    Grid::make(4)->schema([
                        Forms\Components\TextInput::make('artwork_price'),
                        Forms\Components\TextInput::make('artwork_royalty'),
                    ]),
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('artwork_ipfs_hash')
                        ->label('Artwork IPFS hash'),
                    ]),
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('artwork_arweave_hash')
                        ->label('Artwork Arweave hash'),
                    ]),
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('artwork_sha_hash')
                        ->label('Artwork SHA hash'),
                    ]),
                ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Owner'),
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
                // Tables\Actions\EditAction::make(),
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
