<?php

namespace App\Livewire\Dashboard;

use App\Models\Link;
use App\Models\LinkClick;
use App\Models\PageView;
use Livewire\Component;

class AnalyticsChart extends Component
{
    public $period = "7d";
    public $views = [];
    public $clicks = [];
    public $topLinks = [];
    public $totalViews = 0;
    public $totalClicks = 0;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $userId = auth()->id();
        $days = match($this->period) {
            "30d" => 30,
            "90d" => 90,
            default => 7,
        };

        $startDate = now()->subDays($days);

        // Daily views
        $viewsRaw = PageView::where("user_id", $userId)
            ->where("date", ">=", $startDate->format("Y-m-d"))
            ->orderBy("date")
            ->pluck("count", "date")
            ->toArray();

        // Daily clicks
        $linkIds = Link::where("user_id", $userId)->pluck("id");
        $clicksRaw = LinkClick::whereIn("link_id", $linkIds)
            ->where("date", ">=", $startDate->format("Y-m-d"))
            ->orderBy("date")
            ->pluck("count", "date")
            ->toArray();

        // Fill in missing days with 0
        $dateLabels = [];
        $viewsSeries = [];
        $clicksSeries = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->format("Y-m-d");
            $label = now()->subDays($i)->format("M j");
            $dateLabels[] = $label;
            $viewsSeries[] = $viewsRaw[$date] ?? 0;
            $clicksSeries[] = $clicksRaw[$date] ?? 0;
        }

        $this->views = $viewsSeries;
        $this->clicks = $clicksSeries;
        $this->totalViews = array_sum($viewsRaw);
        $this->totalClicks = LinkClick::whereIn("link_id", $linkIds)->sum("count");

        // Top links
        $this->topLinks = Link::where("user_id", $userId)
            ->withSum("clicks as total_clicks", "count")
            ->orderByDesc("total_clicks")
            ->limit(5)
            ->get()
            ->toArray();
    }

    public function setPeriod($period)
    {
        $this->period = $period;
        $this->loadData();
    }

    public function render()
    {
        return view("livewire.dashboard.analytics-chart");
    }
}
