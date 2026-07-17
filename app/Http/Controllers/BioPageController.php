<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\PageView;
use App\Models\User;

class BioPageController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->available()->firstOrFail();

        // Track page view
        PageView::incrementOrCreate($user->id);

        $theme = $user->theme;
        $links = $user->links()->get()->filter(fn($link) => $link->isVisible());

        return view('bio.show', compact('user', 'theme', 'links'));
    }

    public function preview($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        abort_unless(auth()->id() === $user->id, 403);

        $theme = $user->theme;
        $links = $user->links()->get()->filter(fn($link) => $link->isVisible());

        return view('bio.show', compact('user', 'theme', 'links'));
    }
}
