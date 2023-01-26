<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEventController extends Controller
{
    
    public function index()
    {
        $user = Auth::user()->id;
        $events = User::find($user)->events;
        return view('user.events', ['events' => $events]);
    }
}
