<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Events') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-50 text-gray-900">
                    @foreach ($events as $event)
                        <div class="bg-white rounded-lg shadow-md mb-6 overflow-hidden">
                            <div class="flex items-center">
                                @if($event->image_url)
                                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-1/3 h-48 object-cover">
                                @else
                                    <img src="{{ Vite::asset('resources/images/default-event.jpg') }}" alt="{{ $event->title }}" class="w-1/3 h-48 object-cover">
                                @endif
                                <div class="p-6 w-2/3">
                                    <h4 class="text-xl font-semibold mb-2">{{ $event->title }}</h4>
                                    <p class="text-gray-600 mb-2"><span class="font-semibold">Start:</span> {{ \Carbon\Carbon::parse($event->from)->format('F j, Y, g:i a') }}</p>
                                    <p class="text-gray-600 mb-2"><span class="font-semibold">End:</span> {{ \Carbon\Carbon::parse($event->to)->format('F j, Y, g:i a') }}</p>
                                    <p class="text-gray-600 mb-2"><span class="font-semibold">City:</span> {{ $event->city->name }}</p>
                                    <p class="text-gray-600 mb-2"><span class="font-semibold">Ticket Price:</span> ${{ number_format($event->ticket_price, 2) }}</p>
                                    <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                                    <div class="flex space-x-4">
                                        <a href="{{ $event->ticket_url }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Buy Tickets
                                        </a>
                                        {{-- <a href="{{ route('events.show', $event->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            More Details
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if($events->isEmpty())
                        <p class="text-gray-600 text-center">No events found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
