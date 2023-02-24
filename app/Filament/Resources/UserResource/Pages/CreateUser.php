<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

use Filament\Forms;
use Filament\Forms\Components\Group;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormSchema(): array
    {
        return [
            Group::make()->schema([
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
            ])->columns(2)
        ];
    }
}
