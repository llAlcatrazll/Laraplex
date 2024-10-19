<x-filament::page>
    {{-- <div class="mt-4"> --}}
        {{-- @foreach ($this->getWidgets() as $widget)
            <x-dynamic-component :component="$widget" />

        @endforeach --}}
        @livewire(App\Filament\Agso\Widgets\BookingCalendarWidget::class)

</x-filament::page>
