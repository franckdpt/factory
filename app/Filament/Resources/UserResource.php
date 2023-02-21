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
use Filament\Forms\Components\Group;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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

                Group::make()->schema([
                    Forms\Components\Section::make('Identity')->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('wallet_address')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\Select::make('expos')
                            ->multiple()
                            ->relationship('expos', 'name')
                            ->preload()
                    ]),
                ])->columnSpan(['lg' => 1]),

                Group::make()->schema([
                    Forms\Components\Section::make('On mint page')->schema([
                        Forms\Components\TextInput::make('portfolio_link'),
                        Forms\Components\TextInput::make('twitter_link'),
                        Forms\Components\TextInput::make('contact_mail'),
                    ]),
                ])->columnSpan(['lg' => 1]),
            ])->columns(2);
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
