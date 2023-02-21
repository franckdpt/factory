@props([
    'breadcrumbs' => [],
])

<header {{ $attributes->class([
    'filament-main-topbar sticky top-0 z-10 flex h-16 w-full shrink-0 items-center border-b bg-white',
    'dark:bg-gray-800 dark:border-gray-700' => config('filament.dark_mode'),
]) }}>
    <div class="flex items-center w-full px-2 sm:px-4 md:px-6 lg:px-8">
        <button
            x-cloak
            x-data="{}"
            x-bind:aria-label="$store.sidebar.isOpen ? '{{ __('filament::layout.buttons.sidebar.collapse.label') }}' : '{{ __('filament::layout.buttons.sidebar.expand.label') }}'"
            x-on:click="$store.sidebar.isOpen ? $store.sidebar.close() : $store.sidebar.open()"
            @class([
                'filament-sidebar-open-button shrink-0 flex items-center justify-center w-10 h-10 text-primary-500 rounded-full hover:bg-gray-500/5 focus:bg-primary-500/10 focus:outline-none',
                'lg:mr-4 rtl:lg:mr-0 rtl:lg:ml-4' => config('filament.layout.sidebar.is_collapsible_on_desktop'),
                'lg:hidden' => ! (config('filament.layout.sidebar.is_collapsible_on_desktop') && (config('filament.layout.sidebar.collapsed_width') === 0)),
            ])
        >
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <div class="flex items-center justify-between flex-1">
            {{-- <x-filament::layouts.app.topbar.breadcrumbs :breadcrumbs="$breadcrumbs" /> --}}

            @livewire('filament.core.global-search')

            @livewire('filament.core.notifications')

            <div class="filament-page-actions flex flex-wrap items-center gap-4 justify-start shrink-0">
                @livewire('wallet-button', [
                    'classAdded' => 'filament-button filament-button-size-md inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action'
                ])
            </div>
            
            {{-- <x-filament::layouts.app.topbar.user-menu /> --}}
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        shift = false
        Livewire.on('userDisconnected', function () {
            window.location.reload();
        });
        Livewire.on('userConnected', function () {
            if (shift) {
                window.location.reload();
            }
            shift = true
        });
    })

</script>
