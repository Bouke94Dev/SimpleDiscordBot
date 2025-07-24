<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscordController;

Route::get('/', [DiscordController::class, 'show'])->name('discord.options.show');
Route::post('/', [DiscordController::class, 'handleForm'])->name('discord.handle.submit');