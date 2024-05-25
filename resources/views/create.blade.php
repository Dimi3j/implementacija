@extends('layout.main')

@section('title', 'Create Event')

@section('body')
    <div class="container mt-5">
        <h1>Create Event</h1>

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

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="" disabled {{ old('user_id') ? '' : 'selected' }}>Select a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type_id">Type</label>
                <select name="type_id" id="type_id" class="form-control">
                    <option value="" disabled {{ old('type_id') ? '' : 'selected' }}>Select a type</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="city_id">City</label>
                <select name="city_id" id="city_id" class="form-control">
                    <option value="" disabled {{ old('city_id') ? '' : 'selected' }}>Select a city</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Rock Concert" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="ticket_price">Ticket Price</label>
                <input type="text" name="ticket_price" id="ticket_price" class="form-control" placeholder="50.00" value="{{ old('ticket_price') }}">
            </div>

            <div class="form-group">
                <label for="ticket_url">Ticket URL</label>
                <input type="text" name="ticket_url" id="ticket_url" class="form-control" placeholder="http://kupikartizase.com" value="{{ old('ticket_url') }}">
            </div>

            <div class="form-group">
                <label for="from">From</label>
                <input type="datetime-local" name="from" id="from" class="form-control" value="{{ old('from') }}" required>
            </div>

            <div class="form-group">
                <label for="to">To</label>
                <input type="datetime-local" name="to" id="to" class="form-control" value="{{ old('to') }}" required>
            </div>

            <div class="form-group">
                <label for="image_url">Image URL</label>
                <input type="text" name="image_url" id="image_url" class="form-control" placeholder="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg" value="{{ old('image_url') }}" required>
            </div>

            <div class="form-group">
                <label for="comment">Comment</label>
                <input type="text" name="comment" id="comment" class="form-control" placeholder="This is going to be an amazing rock concert!" value="{{ old('comment') }}" required>
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" name="contact" id="contact" class="form-control" placeholder="contact@example.com" value="{{ old('contact') }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Madison Square Garden" value="{{ old('location') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>
@endsection
