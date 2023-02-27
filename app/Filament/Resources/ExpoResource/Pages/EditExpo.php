<?php

namespace App\Filament\Resources\ExpoResource\Pages;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

use App\Filament\Resources\ExpoResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Fieldset;

class EditExpo extends EditRecord
{
    protected static string $resource = ExpoResource::class;

    protected function getActions(): array
    {
        $action = [];
        $action[] = Action::make('Expo page')->icon('heroicon-o-document-text')->url(route('expo', ['expo' => $this->record]));
        $action[] = Action::make('Deployment page')->icon('heroicon-o-document-text')->url(route('deploy', ['expo' => $this->record]));

        return $action;
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
                    Forms\Components\Section::make('Exposition info')
                    ->description('Off-chain & editable. Info displayed on the website')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->unique()
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->required(),
                        Forms\Components\DatePicker::make('start_date')
                            ->minDate(today())
                            ->required(),
                        Forms\Components\DatePicker::make('end_date')
                            ->required(),
                        Forms\Components\TextInput::make('nb_deployment_authorized')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->required(),
                    ]),
                ])->columnSpan(['lg' => 1]),

                Group::make()->schema([
                    Fieldset::make('On-chain info')
                    ->extraAttributes(['style' => 'border-color: #ffc100;'])
                    ->schema([
                        Grid::make(1)->schema([
                            Placeholder::make('Collections name')
                                ->content(new HtmlString('<b>'.$this->record->contracts_name.'<i>(artist name)</i></b>')),
                        ]),
                        Grid::make(1)->schema([
                            Placeholder::make('Collections Symbol prefix')
                                ->content(new HtmlString('<b>'.$this->record->contracts_symbol.'</b>')),
                        ]),
                        Grid::make(1)->schema([
                            Placeholder::make('Collections description')
                                ->content(new HtmlString('<b>'.$this->record->contracts_description.'</b>')),
                        ]),
                        Placeholder::make('30% royalty wallet :')
                            ->content(new HtmlString('<b>'.$this->record->factory_address.'</b>')),
                    ])->columnSpan(['lg' => 1]),
                ])->columnSpan(['lg' => 1]),
                
                Forms\Components\Section::make('Deployment allowing')
                ->description('Off-chain & editable')
                ->schema([
                    Forms\Components\Select::make('artists')
                        ->multiple()
                        ->relationship('artists', 'name_and_wallet', fn (Builder $query) => $query->whereNotNull("name"))
                        ->preload()
                ]),
            ])->columns(2)
        ];
    }
}
