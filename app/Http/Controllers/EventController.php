<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEventRequest;
use App\Models\Event;
use DateTime;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        // Middleware only applied to these methods
        $this->middleware(['role:admin','permission:create-events'])->only([
        'create',
        'edit'
    ]);
    }
    public function index()
    {
        $events = Event::with('users')->get();
        return view('events.index', compact('events'));
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
        $request->validated();

        $image = $request->file('image_path');
        $input['image_path'] = uniqid() . '.' . $image->extension();

        $filePath = public_path('/storage/images/events');
        $img = Image::make($image->path());
        $img->fit(200)->save($filePath . '/' . $input['image_path']);

        $filePath = public_path('/images');
        $image->move($filePath, $input['image_path']);

        $datetime = new DateTime($request->expiration_date);

        $date = $datetime->format('Y-m-d');
        $time = $datetime->format('H:i:s');

        $event  = new Event;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->expiration_date = $date;
        $event->expiration_time = $time;
        $event->location = $request->location;
        $event->max_participants = $request->max_participants;
        $event->image_path = $input['image_path'];

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
