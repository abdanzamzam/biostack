<?php

use App\Http\Controllers\Api\TrackController;
use Illuminate\Support\Facades\Route;

Route::post("/click/{link}", [TrackController::class, "click"])->name("api.click");
