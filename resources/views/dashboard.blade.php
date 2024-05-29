<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Events') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $event)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}"
                            class="w-full h-64 object-cover object-center">

                        <div class="p-6">
                            <h4 class="text-xl font-semibold mb-2">{{ $event->title }}</h4>
                            <p class="text-gray-600 mb-2"><span class="font-semibold">Start:</span>
                                {{ \Carbon\Carbon::parse($event->from)->format('F j, Y, g:i a') }}</p>
                            <p class="text-gray-600 mb-2"><span class="font-semibold">End:</span>
                                {{ \Carbon\Carbon::parse($event->to)->format('F j, Y, g:i a') }}</p>
                            <p class="text-gray-600 mb-2"><span class="font-semibold">City:</span>
                                {{ $event->city->name }}</p>
                            <p class="text-gray-600 mb-2"><span class="font-semibold">Ticket Price:</span>
                                @if ($event->ticket_price)
                                    ${{ number_format($event->ticket_price, 2) }}
                                @else
                                    Free
                                @endif
                            </p>
                            <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                        </div>
                    </div>
                @endforeach
                @if ($events->isEmpty())
                    <p class="text-gray-600 text-center col-span-full">No events found.</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
