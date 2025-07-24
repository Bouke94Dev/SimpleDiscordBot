<?php

namespace App\Http\Controllers;

use App\DTO\MessageDTO;
use Illuminate\Http\Request;
use App\Services\DiscordService;

class DiscordController extends controller
{
    public function show()
    {
        return view('overview');
    }

    public function handleForm(Request $request, DiscordService $discord){
        $validated = $request->validate([
                'message' => 'required',
            ]);
         
        $message = new MessageDTO($validated['message']);

        $discord->sendMessage($message);

        return back()->with('succes', 'bericht is verzonden');  

    }
}