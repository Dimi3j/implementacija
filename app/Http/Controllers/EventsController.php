<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Company;

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

    public function index(Request $request) //events for users
    {
        $swipers = Event::all();
        $cities = City::all();
        $premiumCompanies = Company::where('premium', true)->get();
        $query = Event::query();

        if ($request->has('filter') && $request->input('filter') != 'all') {
            $query->where('company_id', $request->input('filter'));
        }

        if ($request->has('city')) {
            $query->where('city_id', $request->input('city'));
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        $events = $query->get();

        return view('welcome-page', compact('events', 'cities', 'premiumCompanies', 'swipers'));
    }

    public function allEvents() // events for admins
    {
        $events = Event::all();

        return view('dashboard', compact('events'));
    }

    public function ourEvents() // For event org
    {
        $company_id = auth()->user()->company_id;

        $events = Event::where('company_id', $company_id)->get();

        return view('all-events-dash', compact('events'));
    }

    public function edit(Event $event) // Edit an existing event
    {
        return view('edit-event', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event) // validate the edit and update to database
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
