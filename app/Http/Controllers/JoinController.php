<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinController extends Controller
{
    public function update(Event $event)
    {
        $user = Auth::user()->id;
        $event->users()->attach($user);

        $eventUpdate =  Event::findOrFail($event->id);

        $eventUpdate->participants += 1;
        $event->save();

        return to_route('events.index')->with('status', 'Joined');
    }
}
