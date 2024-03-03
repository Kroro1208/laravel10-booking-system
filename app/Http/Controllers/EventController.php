<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Models\Country;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('country')->get(); // eager loading(N+1問題対応)
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $tags = Tag::all();
        return view('events.create', compact('countries', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEventRequest $request)
    {
        if ($request->hasFile('image')) {
            $data = $request->validated();
            // アップロードされた画像ファイルをサーバー上(storage/app/public/events)に保存し、そのファイルの保存先パスを $data['image'] に格納
            $data['image'] = Storage::putFile('events', $request->file('image'));
            $data['user_id'] = auth()->id();
            $data['slug'] = Str::slug($request->title); // Str::slug()は、与えられた文字列を URL に適した「スラッグ」形式に変換

            $event = Event::create($data);
            $event->tags()->attach($request->tags);
            return to_route('events.index');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
