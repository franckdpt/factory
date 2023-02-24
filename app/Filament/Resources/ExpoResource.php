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
use Filament\Forms\Components\Group;

class ExpoResource extends Resource
{
    protected static ?string $model = Expo::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return [ 'name', 'contracts_name'];
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
