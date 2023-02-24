<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Illuminate\Support\HtmlString;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Group;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getFormSchema(): array
    {
        return [
            Group::make()->schema([
                Group::make()->schema([
                    Forms\Components\Section::make('Identity')
                    ->description('Off-chain & editable except the wallet address.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->required(),
                        Placeholder::make('Wallet address')
                            ->content(new HtmlString('<b>'.$this->record->wallet_address.'</b>')),
                        Forms\Components\Select::make('expos')
                            ->multiple()
                            ->relationship('expos', 'name')
                            ->preload()
                    ]),
                ])->columnSpan(['lg' => 1]),

                Group::make()->schema([
                    Forms\Components\Section::make('On mint page')
                    ->description('Off-chain & editable. Info displayed on the website.')
                    ->schema([
                        Forms\Components\TextInput::make('portfolio_link'),
                        Forms\Components\TextInput::make('twitter_link'),
                        Forms\Components\TextInput::make('contact_mail'),
                    ]),
                ])->columnSpan(['lg' => 1]),
            ])->columns(2)
        ];
    }
}
