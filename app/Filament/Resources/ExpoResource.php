<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpoResource\Pages;
use App\Filament\Resources\ExpoResource\RelationManagers;
use App\Models\Expo;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;

class ExpoResource extends Resource
{
    protected static ?string $model = Expo::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Collections Info')->schema([
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('name')
                        ->maxLength(255)
                        ->required(),
                    ]),
                    Grid::make(2)->schema([
                        Forms\Components\Textarea::make('description')
                        ->maxLength(65535)
                        ->required(),
                    ])
                ]),

                Fieldset::make('Collections Info')->schema([
                    Grid::make(4)->schema([
                        Forms\Components\TextInput::make('contracts_name')
                        ->label("Collections name")
                        ->maxLength(255)
                        ->required(),
                        Forms\Components\TextInput::make('contracts_symbol')
                        ->label("Collections Symbol")
                        ->maxLength(255)
                        ->required(),
                    ]),
                    Grid::make(2)->schema([
                        Forms\Components\Textarea::make('contracts_description')
                        ->label("Collections description")
                        ->maxLength(65535)
                        ->required(),
                    ]),
                ]),
                
            Forms\Components\Select::make('artists')
            ->multiple()
            ->relationship('artists', 'name_and_wallet', fn (Builder $query) => $query->whereNotNull("name"))
            ->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
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
            'index' => Pages\ListExpos::route('/'),
            'create' => Pages\CreateExpo::route('/create'),
            'edit' => Pages\EditExpo::route('/{record}/edit'),
        ];
    }    
}
