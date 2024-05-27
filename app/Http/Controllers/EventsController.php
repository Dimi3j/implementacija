<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventsController extends Controller
{
    public function create()
    {
        $cities = City::all();
        $types = Type::all();
        $users = User::all();

        return view('create-event', compact('cities', 'types', 'users'));
    }

    public function store(StoreEventRequest $request)
    {
        Event::create($request->all());

        return redirect()->route('events.create')->with('success', 'Event created successfully!');
    }

    public function index() // For users
    {
        $events = Event::all();
        return view('welcome-page', compact('events'));
    }

    public function allEvents() // For event org
    {
        $events = Event::all();

        return view('all-events-dash', compact('events'));
    }

    public function edit(Event $event) // Edit an existing event
    {
        return view('edit-event', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event) // Validate the edit and update to database
    {
        $validatedData = $request->validated();

        $event->update($validatedData);

        return redirect()->route('events.all')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event) // delete the event
    {
        $event->delete();

        return redirect()->route('events.all')->with('success', 'Event deleted successfully.');
    }
}
