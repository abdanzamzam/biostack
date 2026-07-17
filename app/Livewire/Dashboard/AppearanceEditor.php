<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class AppearanceEditor extends Component
{
    public $page_title = "";
    public $page_bio = "";
    public $page_avatar = "";
    public $bg_type = "gradient";
    public $bg_value = [];
    public $bg_color = "#0f172a";
    public $bg_gradient_start = "#0f766e";
    public $bg_gradient_end = "#0d9488";

    public function mount()
    {
        $user = auth()->user();
        $this->page_title = $user->page_title ?? "";
        $this->page_bio = $user->page_bio ?? "";
        $this->page_avatar = $user->page_avatar ?? "";
        $this->bg_type = $user->bg_type ?? "gradient";

        $val = $user->bg_value ?? [];
        if ($this->bg_type === "gradient" && is_array($val)) {
            $this->bg_gradient_start = $val[0] ?? "#0f766e";
            $this->bg_gradient_end = $val[1] ?? "#0d9488";
        } elseif ($this->bg_type === "solid") {
            $this->bg_color = is_array($val) ? ($val[0] ?? "#0f172a") : ($val ?? "#0f172a");
        }
    }

    public function save()
    {
        $this->validate([
            "page_title" => "nullable|max:255",
            "page_bio" => "nullable|max:1000",
            "page_avatar" => "nullable|url|max:2048",
            "bg_type" => "required|in:solid,gradient",
        ]);

        $user = auth()->user();

        if ($this->bg_type === "gradient") {
            $bgValue = [$this->bg_gradient_start, $this->bg_gradient_end];
        } else {
            $bgValue = [$this->bg_color];
        }

        $user->update([
            "page_title" => $this->page_title,
            "page_bio" => $this->page_bio,
            "page_avatar" => $this->page_avatar ?: null,
            "bg_type" => $this->bg_type,
            "bg_value" => $bgValue,
        ]);

        $this->dispatch("appearanceSaved");
    }

    public function render()
    {
        return view("livewire.dashboard.appearance-editor");
    }
}
