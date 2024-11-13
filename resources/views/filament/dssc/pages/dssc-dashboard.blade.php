<x-filament::page>
   <div class="flex flex-row w-full justify-between">
     {{-- Ensure each widget takes 50% of the available width --}}
     <div class="w-1/2 p-4">
       @livewire(App\Filament\Widgets\UpcomingVenueBookings::class)
     </div>
     <div class="w-1/2 p-4">
       @livewire(App\Filament\Widgets\RecentVenueBookings::class)
     </div>
   </div>
</x-filament::page>
