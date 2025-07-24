<?php

namespace App\Services;

use App\DTO\MessageDTO;
use Illuminate\Support\Facades\Http;

class DiscordApi
{
    protected string $baseUrl = 'https://discord.com/api/v10';
    protected string $token;
    protected string $channelId;

    public function __construct(){
        $this->token = config('services.discord.token');
        $this->channelId = config('services.discord.channel_id');
    }

    public function sendMessageToChannel(string $message)
    {
            $url = $this->baseUrl . "/channels/{$this->channelId}/messages";

            $response = Http::withHeaders($this->getHeaders())
                ->withOptions(['verify' => false]) // only used for testing!
                ->post($url, [
                    'content' => $message
                ])
                ->throw()
                ->json();

            return $response;

    }

    protected function getHeaders()
    {
        return [
            'Authorization' => 'Bot ' . $this->token,
            'Content-Type' => 'application/json',
        ];
    }
}