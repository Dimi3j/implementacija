<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($events as $event)
                        <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                            <h4 class="text-lg font-semibold mb-2">{{ $event->title }}</h4>
                            <p class="text-gray-600 mb-2">Start: {{ $event->from }}</p>
                            <p class="text-gray-600 mb-2">End: {{ $event->to }}</p>
                            <p class="text-gray-600 mb-2">City: {{ $event->city->name }}</p>
                            <p class="text-gray-600 mb-2">Ticket Price: ${{ $event->ticket_price }}</p>
                            <p class="text-gray-600">{{ $event->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
