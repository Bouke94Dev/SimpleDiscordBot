<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send', [DiscordController::class, 'sendMessage']);