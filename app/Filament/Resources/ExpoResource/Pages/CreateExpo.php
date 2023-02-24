<?php

namespace App\Filament\Resources\ExpoResource\Pages;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

use App\Filament\Resources\ExpoResource;
use Filament\Resources\Pages\CreateRecord;

use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;

class CreateExpo extends CreateRecord
{
    protected static string $resource = ExpoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getFormSchema(): array
    {
        return [
            Group::make()->schema([
                Group::make()->schema([
                    Forms\Components\Section::make('Exposition info')
                    ->description('Off-chain & editable. Info displayed on the website')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->required()
                            ->reactive(),
                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->required(),
                    ]),
                ])->columnSpan(['lg' => 1]),

                Group::make()->schema([
                    Forms\Components\Section::make('Deployment allowing')
                    ->description('Off-chain & editable')
                    ->schema([
                        Forms\Components\Select::make('artists')
                            ->multiple()
                            ->relationship('artists', 'name_and_wallet', fn (Builder $query) => $query->whereNotNull("name"))
                            ->preload()
                    ]),
                ])->columnSpan(['lg' => 1]),
                
                Group::make()->schema([
                    Forms\Components\Section::make('Smart contracts info')
                    ->extraAttributes(['style' => 'border-color: #ffc100;'])
                    ->description("⚠️ On-chain. Be aware, you won't be able to edit it later.")
                    ->schema([
                        Placeholder::make('Collections name')
                            ->content(function (Closure $get) {
                                if ($get('name')) {
                                    return new HtmlString('<b>'.$get('name').' X (artist name)</b>');
                                } else {
                                    return new HtmlString('<i>(name is missing)</i>');
                                }
                            }),
                        Placeholder::make('Collections Symbol Prefix')
                            ->content(new HtmlString('<b>'.env('EXPO_SYMBOL_PREFIX').'</b>')),
                        Forms\Components\Textarea::make('contracts_description')
                            ->label("Collections description")
                            ->maxLength(65535)
                            ->required(),
                        Placeholder::make('30% royalty wallet :')
                            ->content(new HtmlString('<b>'.env('FACTORY_WALLET').'</b>')),
                    ]),
                ])->columnSpan(['lg' => 1]),
            ])->columns(2)
        ];
    }
}
