<?php

namespace App\Services;

use App\DTO\MessageDTO;
use Illuminate\Support\Facades\Http;

class DiscordService
{
    public function __construct(protected DiscordAPI $discordAPi){
    }

    public function sendMessage(MessageDTO $messageDto){
        try {
          $this->discordAPi->sendMessageToChannel($messageDto->getMessage());
        }
        catch (\Exception $e){
            logger()->error('App was not able to send a message to discord channel' . $e->getMessage());

            throw new \RuntimeException('Unable to send message to discord channel');
        }

    }
}