<div>
    @if (Auth::check() && !Auth::user()->admin)
        Sorry, this wallet is not allowed
    @endif
    @livewire('wallet-button')
</div>