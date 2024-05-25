<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function create()
    {
        $cities = City::all();
        $types = Type::all();
        $users = User::all();

        return view('create', compact('cities', 'types', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type_id' => 'required|exists:types,id',
            'city_id' => 'required|exists:cities,id',
            'title' => 'required|string|max:255',
            'ticket_price' => 'nullable|numeric',
            'ticket_url' => 'nullable|url',
            'from' => 'required|date',
            'to' => 'required|date',
            'image_url' => 'required|url',
            'comment' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Event::create($request->all());

        return redirect()->route('events.create')->with('success', 'Event created successfully!');
    }

    public function index()
    {
        $events = Event::all();
        return view('welcome-page', compact('events'));
    }
}
