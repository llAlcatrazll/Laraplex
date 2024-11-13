@use('App\Enums\VenueBookingStatus')

<section wire:poll.3s>
    <div class="pl-[0.75rem] space-y-3">
        {{-- Debug Section --}}
        <div>
            <h4>Debug Info:</h4>
            <ul>
                <li>Total Actions Found: {{ $actions->count() }}</li>
                @foreach ($actions as $action)
                    <li>Action ID: {{ $action->id }}, Status: {{ $action->status }}</li>
                @endforeach
            </ul>
        </div>

        <ol class="relative border-gray-200 border-s dark:border-gray-700">
            @foreach ($actions as $action)
                <li class="mb-4 ms-6">
                    <span
                        class='absolute flex items-center justify-center w-6 h-6 rounded-full bg-custom-500 -start-3 ring-8 ring-white dark:ring-gray-900'
                        @style(["--c-500:var(--{$action->status->getColor()}-500)"])
                    >
                        <x-filament::icon class="w-5 h-5 text-neutral-100" icon="{{ $action->status->getIcon() }}"/>
                    </span>

                    <h3 class="flex items-center mb-1 text-base">
                        <span class='text-custom-500' @style(["--c-500:var(--{$action->status->getColor()}-500)"])>
                            {{ $action->status->getLabel() }}
                        </span>
                    </h3>

                    <time class="block mb-2 text-sm font-light leading-none text-neutral-500">
                        <span class="font-bold">
                            {{ $action->user->name }}
                        </span>
                        on {{ $action->created_at->format('jS \of F Y \a\t H:i') }} ({{ $action->created_at->diffForHumans() }})
                    </time>
                </li>
            @endforeach

            <li class="mb-4 ms-6">
                <span
                    class='absolute flex items-center justify-center w-6 h-6 rounded-full bg-custom-500 -start-3 ring-8 ring-white dark:ring-gray-900'
                    @style(["--c-500:var(--info-500)"])
                >
                    <x-filament::icon class="w-5 h-5 text-neutral-100" />
                </span>

                <h3 class="flex items-center mb-1 text-base">
                    <span class='text-custom-500' @style(["--c-500:var(--info-500"])>
                        Created
                    </span>
                </h3>

                <time class="block mb-2 text-sm font-light leading-none text-neutral-500">
                    <span class="font-bold">
                        {{ $booking->booker }}
                    </span>
                    on {{ $booking->created_at->format('jS \of F Y \a\t H:i:s') }} ({{ $booking->created_at->diffForHumans() }}).
                </time>
            </li>
        </ol>
    </div>
</section>
