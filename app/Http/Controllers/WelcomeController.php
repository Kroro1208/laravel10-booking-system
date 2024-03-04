<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // __invoke()は'/'へのGETリクエストが来たときにWelcomeControllerの__invoke()メソッドが呼び出される
    public function __invoke()
    {
        $events = Event::with('country', 'tags')->where('start_date', '>=', today())->orderBy('created_at', 'desc')->get();
        return view('welcome', compact('events'));
    }
}
