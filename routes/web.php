<?php

use App\Http\Controllers\DiscordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DiscordController::class, 'show'])->name('discord.options.show');
Route::post('/', [DiscordController::class, 'handleForm'])->name('discord.handle.submit');
