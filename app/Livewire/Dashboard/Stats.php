<?php

namespace App\Livewire\Dashboard;

use App\Models\Link;
use App\Models\PageView;
use App\Models\LinkClick;
use Livewire\Component;

class Stats extends Component
{
    public $totalLinks = 0;
    public $activeLinks = 0;
    public $totalViews = 0;
    public $totalClicks = 0;

    public function mount()
    {
        $userId = auth()->id();
        $this->totalLinks = Link::where('user_id', $userId)->count();
        $this->activeLinks = Link::where('user_id', $userId)->where('is_active', true)->count();
        $this->totalViews = PageView::where('user_id', $userId)->sum('count');
        $this->totalClicks = LinkClick::whereIn('link_id', Link::where('user_id', $userId)->pluck('id'))->sum('count');
    }

    public function render()
    {
        return view('livewire.dashboard.stats');
    }
}
