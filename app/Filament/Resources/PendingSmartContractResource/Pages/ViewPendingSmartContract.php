<?php

namespace App\Filament\Resources\SmartContractResource\Pages;

use App\Filament\Resources\SmartContractResource;
use App\Filament\Resources\PendingSmartContractResource;

use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;

class ViewPendingSmartContract extends ViewRecord
{
    protected static string $resource = PendingSmartContractResource::class;

    protected function getFormSchema(): array
    {
        return [
            Group::make()->schema([
                Group::make()->schema([
                    Forms\Components\Section::make('Collection')->schema([
                        Forms\Components\TextInput::make('artwork_title'),
                        Forms\Components\Textarea::make('artwork_description'),
                        Grid::make(3)->schema([
                            Forms\Components\Select::make('network')->relationship('network', 'name'),
                            Forms\Components\TextInput::make('artwork_max_supply')->label('Max Supply'),
                            Forms\Components\TextInput::make('self_nfts_number')->label('Reserved copies'),
                        ]),
                        Grid::make(3)->schema([
                            Forms\Components\TextInput::make('artwork_price'),
                            Forms\Components\TextInput::make('artwork_royalty'),
                            Forms\Components\TextInput::make('artwork_hd_extension'),
                        ]),
                        Forms\Components\TextInput::make('artwork_sha_hash')->label('Artwork SHA hash'),
                    ]),
                ])->columnSpan(['lg' => 2]),

                Group::make()->relationship('user')->schema([
                    Forms\Components\Section::make('Owner')->schema([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\TextInput::make('wallet_address')
                    ])
                ])->columnSpan(['lg' => 1]),
            ])->columns(3)
        ];
    }

    protected function getActions(): array
    {
        $actions = [];
        $actions[] = Action::make('Mint page')
                    ->icon('heroicon-o-document-text')
                    ->url(route('mint', ['expo' => $this->record->expo, 'smart_contract_publicid' => $this->record->public_id]));

        if ($this->record->status == 'in_review') {
            $actions[] = Action::make('approve contract')
                            ->action(function() {
                                $this->record->status = 'ready_to_deploy';
                                $this->record->save();
                                redirect()->to($this->getResource()::getUrl('index'));
                            })
                            ->requiresConfirmation();
        }

        return $actions;
    }

    protected function getFooterWidgetsColumns(): int | array
    {
        return 3;
    }

    protected function getFooterWidgets(): array
    {
        return [
            SmartContractResource\Widgets\SmartContractArtworkVisual::class,
            SmartContractResource\Widgets\SmartContractArweaveArtworkVisual::class,
            SmartContractResource\Widgets\SmartContractIpfsArtworkVisual::class,
            SmartContractResource\Widgets\SmartContractContractJson::class,
            SmartContractResource\Widgets\SmartContractTokenJson::class,
        ];
    }
}
