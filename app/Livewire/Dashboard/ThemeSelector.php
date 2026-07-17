<?php

namespace App\Livewire\Dashboard;

use App\Models\Theme;
use Livewire\Component;

class ThemeSelector extends Component
{
    public $currentThemeId = null;

    public function mount()
    {
        $this->currentThemeId = auth()->user()->theme_id;
    }

    public function selectTheme($themeId)
    {
        $theme = Theme::findOrFail($themeId);

        if ($theme->is_premium) {
            $this->dispatch("themeRequiresPro");
            return;
        }

        auth()->user()->update(["theme_id" => $themeId]);
        $this->currentThemeId = $themeId;
        $this->dispatch("themeApplied");
    }

    public function render()
    {
        $themes = Theme::orderBy("is_premium")->orderBy("id")->get();
        return view("livewire.dashboard.theme-selector", [
            "themes" => $themes,
        ]);
    }
}
