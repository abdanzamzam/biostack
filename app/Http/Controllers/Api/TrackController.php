<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\LinkClick;
use App\Models\PageView;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function click(Request $request, Link $link)
    {
        $link->increment('click_count');
        LinkClick::incrementOrCreate($link->id);

        return response()->json(['ok' => true]);
    }
}
