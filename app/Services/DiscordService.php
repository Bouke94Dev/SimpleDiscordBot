<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordService
{
    protected $token;
    protected $channelId;

    public function __construct(){
        $this->token = config('services.discord.token');
        $this->channelId = config('services.discord.channel_id');
    }

    public function sendMessage(string $message)
    {
        $url = "https://discord.com/api/v10/channels/{$this->channelId}/messages";

        $response = Http::withHeaders([
            'Authorization' => 'Bot ' . $this->token,
            'Content-Type' => 'application/json',
            ])
            ->withOptions(['verify' => false]) // only used for testing!
            ->post($url, [
                'content' => $message
            ])->json();
        
        return $response;

    }

}