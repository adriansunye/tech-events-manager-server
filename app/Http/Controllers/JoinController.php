<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
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

        $details['email'] = Auth::user()->email;
 
        Mail::to($details['email'])->queue(new SendEmailEventJoined($event));
        
        //dispatch(new SendEmailJob($details));

        return to_route('events.index')->with('status', 'Joined');
    }
}
