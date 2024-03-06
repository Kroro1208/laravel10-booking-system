<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AttendingEventController extends Controller
{
    public function __invoke()
    {
        $events = Event::with('attendings')->whereHas('attendings', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();
        return view('events.attendingEvents', compact('events'));
    }
}
