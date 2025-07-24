<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/discord', [DiscordController::class, 'show'])->name('discord.options.show');
Route::post('/discord', [DiscordController::class, 'handleForm'])->name('discord.handle.submit');