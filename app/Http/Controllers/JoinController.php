<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailEventJoined;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JoinController extends Controller
{
    public function update(Event $event)
    {
        $user = Auth::user()->id;
        $event->users()->attach($user);

        $event->increment('participants');
        $event->save();
 
        Mail::to(Auth::user()->email)->send(new SendEmailEventJoined($event));

        return to_route('events.index')->with('status', 't\'has unit');
    }
}
