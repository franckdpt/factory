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


class SmartContractResource extends Resource
{
    protected static ?string $model = SmartContract::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Collections';

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Forms\Components\Section::make('Smart Contract info')->schema([
                        Grid::make(2)->schema([
                            Forms\Components\Select::make('network')
                                ->relationship('network', 'name')
                        ]),
                        Forms\Components\TextInput::make('address')
                            ->label("Smart contract address"),
                        Forms\Components\TextInput::make('token_ipfs_hash')
                            ->label('TokenURI'),
                    ]),

                    Forms\Components\Section::make('Artwork')->schema([
                        Forms\Components\TextInput::make('artwork_title'),
                        Forms\Components\Textarea::make('artwork_description'),
                        Grid::make(2)->schema([
                            Forms\Components\TextInput::make('artwork_max_supply'),
                            Forms\Components\TextInput::make('self_nfts_number')->label('Reserved copies'),
                        ]),
                        Grid::make(3)->schema([
                            Forms\Components\TextInput::make('artwork_price'),
                            Forms\Components\TextInput::make('artwork_royalty'),
                            Forms\Components\TextInput::make('artwork_hd_extension'),
                        ]),
                        Forms\Components\TextInput::make('artwork_ipfs_hash')
                            ->label('Artwork IPFS hash'),
                        Forms\Components\TextInput::make('artwork_arweave_hash')
                            ->label('Artwork Arweave hash'),
                        Forms\Components\TextInput::make('artwork_sha_hash')
                            ->label('Artwork SHA hash'),
                    ]),
                ])->columnSpan(['lg' => 2]),

                Group::make()->relationship('user')->schema([
                    Forms\Components\Section::make('Owner')->schema([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\TextInput::make('wallet_address')
                    ])
                ])->columnSpan(['lg' => 1]),
                
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('artwork_title'),
                Tables\Columns\TextColumn::make('artwork_price'),
                Tables\Columns\TextColumn::make('user.name')->label('Owner'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\IconColumn::make('deployed')->boolean(),
            ])
            ->filters([
                // Filter::make('in_review')
                //     ->query(fn (Builder $query): Builder => $query->where('status', 'in_review'))
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
