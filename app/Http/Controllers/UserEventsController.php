<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class UserEventsController extends Controller
{
    public function index()
    {
        $events = DB::table('events')->get();
        return view('user.events', ['events' => $events]);
    }
}
