<?php

use App\Http\Controllers\BioPageController;
use App\Livewire\Dashboard\AccountSettings;
use App\Livewire\Dashboard\AnalyticsChart;
use App\Livewire\Dashboard\AppearanceEditor;
use App\Livewire\Dashboard\DomainSettings;
use App\Livewire\Dashboard\LinkManager;
use App\Livewire\Dashboard\Stats;
use App\Livewire\Dashboard\ThemeSelector;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});

// Auth routes FIRST (more specific)
require __DIR__."/auth.php";

// Dashboard routes (authenticated)
Route::middleware(["auth"])->group(function () {
    Route::get("/dashboard", Stats::class)->name("dashboard");
    Route::get("/dashboard/links", LinkManager::class)->name("dashboard.links");
    Route::get("/dashboard/appearance", AppearanceEditor::class)->name("dashboard.appearance");
    Route::get("/dashboard/analytics", AnalyticsChart::class)->name("dashboard.analytics");
    Route::get("/dashboard/themes", ThemeSelector::class)->name("dashboard.themes");
    Route::get("/dashboard/domain", DomainSettings::class)->name("dashboard.domain");
    Route::get("/dashboard/settings", AccountSettings::class)->name("dashboard.settings");
});

// Bio page catch-all LAST (least specific)
Route::get("/{username}", [BioPageController::class, "show"])->name("bio.page");
Route::get("/{username}/preview", [BioPageController::class, "preview"])->name("bio.preview");
