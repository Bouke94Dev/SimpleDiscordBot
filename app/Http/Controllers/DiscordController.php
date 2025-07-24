<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DiscordService;

class DiscordController extends controller
{
    public function sendMessage(DiscordService $discord)
    {
        $discord->sendMessage("hi daar vanuit de app");
        return response()->json(['status' => 'bericht is verzonden']);
    }
}