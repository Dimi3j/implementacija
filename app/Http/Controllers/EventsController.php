<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;

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

    public function index()
    {
        $events = Event::all();
        return view('welcome-page', compact('events'));
    }

    public function allEvents()
    {
        $events = Event::all();

        return view('all-events-dash', compact('events'));
    }
}
