<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('events.update', $event->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $event->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="ticket_price">Ticket Price</label>
                            <input type="text" name="ticket_price" id="ticket_price" class="form-control"
                                value="{{ $event->ticket_price }}">
                        </div>

                        <div class="form-group">
                            <label for="ticket_url">Ticket URL</label>
                            <input type="text" name="ticket_url" id="ticket_url" class="form-control"
                                value="{{ $event->ticket_url }}">
                        </div>

                        <div class="form-group">
                            <label for="from">From</label>
                            <input type="datetime-local" name="from" id="from" class="form-control"
                                value="{{ \Carbon\Carbon::parse($event->from)->format('Y-m-d\TH:i') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="to">To</label>
                            <input type="datetime-local" name="to" id="to" class="form-control"
                                value="{{ \Carbon\Carbon::parse($event->to)->format('Y-m-d\TH:i') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image_url">Image URL</label>
                            <input type="text" name="image_url" id="image_url" class="form-control"
                                value="{{ $event->image_url }}" required>
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <input type="text" name="comment" id="comment" class="form-control"
                                value="{{ $event->comment }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control"
                                value="{{ $event->contact }}" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control"
                                value="{{ $event->location }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
