<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventShowController extends Controller
{
    public function __invoke($id)
    {
        $event = Event::findOrFail($id);
        // 特定のイベントに対して現在認証されているユーザーが「いいね」をしているかどうかを確認する処理
        // first()で最初のレコードを取得して同じイベントに複数回いいねしてもカウントしないようにする
        $like = $event->likes()->where('user_id', auth()->id())->first();
        return view('eventShow', compact('event', 'like'));
    }
}
