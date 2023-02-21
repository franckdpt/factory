<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Users';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'wallet_address'];
    }

    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Wallet' => $record->wallet_address,
        ];
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->required(),
                ]),
                Grid::make(2)->schema([
                    Forms\Components\TextInput::make('wallet_address')
                    ->maxLength(255)
                    ->required(),
                ]),
                Grid::make(2)->schema([
                    Forms\Components\Select::make('expos')
                    ->multiple()
                    ->relationship('expos', 'name')
                ]),
                Fieldset::make('Displayed on mint page')->schema([
                    Grid::make(4)->schema([
                        Forms\Components\TextInput::make('portfolio_link')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('twitter_link')
                        ->maxLength(255),
                    ]),
                    Forms\Components\TextInput::make('contact_mail')
                        ->maxLength(255),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\IconColumn::make('admin')
                    ->boolean(),
                Tables\Columns\TextColumn::make('wallet_address'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
