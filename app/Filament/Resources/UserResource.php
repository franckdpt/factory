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

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                Grid::make(3)->schema([
                    Forms\Components\TextInput::make('portfolio_link')
                    ->maxLength(255),
                    Forms\Components\TextInput::make('twitter_link')
                    ->maxLength(255),
                    Forms\Components\TextInput::make('contact_mail')
                    ->maxLength(255),
                ]),
                Grid::make(1)->schema([
                    Forms\Components\Select::make('expos')
                    ->multiple()
                    ->relationship('expos', 'name')
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
