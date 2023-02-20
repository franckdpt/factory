<x-filament::widget>
    <x-filament::card>
        @if ($record->token_ipfs_hash)
            <a href="{{ $record->getTokenIpfsUrl() }}" target="_blank">
                <b>Token URL</b>
            </a>
        @else
            No contract Json yet.
        @endif
    </x-filament::card>
</x-filament::widget>
