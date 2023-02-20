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
 
    protected static ?string $navigationLabel = 'In review';

    protected static ?string $navigationGroup = 'Smart Contracts';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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

    protected static function getNavigationBadge(): ?string
    {
        $nb = static::$model::where('status', 'in_review')->count();
        return $nb > 0 ? $nb : null;
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
                Group::make()->schema([
                    Forms\Components\Section::make('Artwork')->schema([
                        Grid::make(2)->schema([
                            Forms\Components\TextInput::make('artwork_title'),
                            Forms\Components\Textarea::make('artwork_description'),
                        ]),
                        Grid::make(2)->schema([
                            Forms\Components\TextInput::make('artwork_hd_extension'),
                            Forms\Components\TextInput::make('artwork_max_supply'),
                        ]),
                        Grid::make(2)->schema([
                            Forms\Components\TextInput::make('artwork_price'),
                            Forms\Components\TextInput::make('artwork_royalty'),
                        ]),
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
            ])
            ->filters([
                //
            ])
            ->actions([
                
            ])
            ->bulkActions([
                
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
            'index' => Pages\ListPendingSmartContracts::route('/'),
            'view' => Pages\ViewPendingSmartContract::route('/{record}'),
        ];
    }    
}
