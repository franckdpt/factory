<?php

namespace App\Filament\Resources\SmartContractResource\Pages;

use Illuminate\Support\HtmlString;

use App\Models\SmartContract;
use App\Filament\Resources\SmartContractResource;
use App\Filament\Resources\PendingSmartContractResource;

use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Fieldset;

class ViewPendingSmartContract extends ViewRecord
{
    protected static string $resource = PendingSmartContractResource::class;

    protected function getFormSchema(): array
    {
        return [
            Group::make()->schema([
                Fieldset::make('On-chain info')
                ->extraAttributes(['style' => 'border-color: #ffc100;'])
                ->schema([
                    Grid::make(3)->schema([
                        Placeholder::make('Smart contract name')
                        ->content(new HtmlString('<b>'.$this->record->getContractName().'</b>')),
                        Placeholder::make('Smart contract symbol')
                        ->content(new HtmlString('<b>'.$this->record->getContractSymbol().'</b>')),
                        Placeholder::make('Network')
                        ->content(new HtmlString('<b>'.$this->record->network->name.'</b>')),
                    ]),

                    Grid::make(2)->schema([
                        Placeholder::make('Artwork title')
                        ->content(new HtmlString('<b>'.$this->record->artwork_title.'</b>')),
                        Placeholder::make('Artwork description')
                        ->content(new HtmlString('<b>'.$this->record->artwork_description.'</b>')),
                    ]),

                    Grid::make(4)->schema([
                        Placeholder::make('Max supply')
                        ->content(new HtmlString('<b>'.$this->record->artwork_max_supply.'</b>')),
                        Placeholder::make('Reserved copies')
                        ->content(new HtmlString('<b>'.$this->record->self_nfts_number.'</b>')),
                        Placeholder::make('Price')
                        ->content(new HtmlString('<b>'.$this->record->artwork_price.' '.$this->record->network->currency.'</b>')),
                        Placeholder::make('Artist royalties')
                        ->content(new HtmlString('<b>'.$this->record->getRoyaltyInput().'%</b>')),
                    ]),

                    Grid::make(1)->schema([
                        Placeholder::make('nft factory wallet royalty')
                        ->content(new HtmlString('<b>30%</b> to <b><i>'.$this->record->expo->factory_address.'</i></b>')),
                    ]),

                    Grid::make(1)->schema([
                        Placeholder::make('sha proof')
                        ->content(new HtmlString('<b>'.$this->record->artwork_sha_hash.'</b>')),
                    ]),

                    Grid::make(1)->schema([
                        Placeholder::make('contract uri')
                        ->content(new HtmlString('
                        <b><u><a href="'.$this->record->getContractUrl().'">'.SmartContract::getPreviewUrlIfNeeded($this->record->getContractUrl(), 80).'</a></u></b>')),
                    ]),

                    Grid::make(1)->schema([
                        Placeholder::make('token uri')
                        ->content(new HtmlString('
                        <b><u><a href="'.$this->record->getTokenIpfsUrl().'">'.SmartContract::getPreviewUrlIfNeeded($this->record->getTokenIpfsUrl(), 80).'</a></u></b>')),
                    ]),

                    Grid::make(1)->schema([
                        Placeholder::make('artwork ipfs uri')
                        ->content(new HtmlString('
                        <b><u><a href="'.$this->record->getArtworkIpfsUrl().'">'.SmartContract::getPreviewUrlIfNeeded($this->record->getArtworkIpfsUrl(), 80).'</a></u></b>')),
                    ]),

                    Grid::make(1)->schema([
                        Placeholder::make('artwork arweave uri')
                        ->content(new HtmlString('
                        <b><u><a href="'.$this->record->getArtworkArweaveUrl().'">'.SmartContract::getPreviewUrlIfNeeded($this->record->getArtworkArweaveUrl(), 80).'</a></u></b>')),
                    ]),

                ])

            ])
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
            SmartContractResource\Widgets\SmartContractArweaveArtworkVisual::class,
            SmartContractResource\Widgets\SmartContractIpfsArtworkVisual::class,
            SmartContractResource\Widgets\SmartContractArtworkVisual::class,
        ];
    }
}
