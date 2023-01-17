<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEventRequest;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageServiceProvider;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        $events = Event::get();

        return view('events.index', ['events' => $events]);
    } 

    public function show(Event $event)
    {
        return view('events.show', ['event' => $event]);
    }

    public function create()
    { 
        return view('events.create', ['event' => new Event]);
    }

    public function store(SaveEventRequest $request)
    {
        $validatedData = $request->validated();

        
        $imageName = time().'.'.$request->image_path->extension();

        // Public Folder
        $request->image_path->move(public_path('storage/images/events'), $imageName);
            
        $event  = new Event ;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->expiration_date = $request->expiration_date;
        $event->location = $request->location;
        $event->max_participants = $request->max_participants;
        $event->image_path = $imageName;

        $event->save();

        return to_route('events.index')->with('status', 'Event created');
    }

    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    public function update(SaveEventRequest $request, Event $event)
    {
        $event->update($request->validated());
        return to_route('events.show', $event)->with('status', 'Event updated');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return to_route('events.index')->with('status', 'Event deleted');
    }
}
