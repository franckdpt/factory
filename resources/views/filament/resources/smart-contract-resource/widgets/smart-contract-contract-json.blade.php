<x-filament::widget>
    <x-filament::card>
        @if ($record->inReview())
            <a href="{{ $record->getContractUrl() }}" target="_blank">
                <b>Contract URL</b>
            </a>
        @else
            No contract Json yet.
        @endif
    </x-filament::card>
</x-filament::widget>
