<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\DiscordService;
use App\Services\DiscordAPI;
use App\DTO\MessageDTO;
use Mockery;

class DiscordServiceTest extends TestCase
{
    /** @test */
    public function it_sends_message_to_discord_api()
    {
        $apiMock = Mockery::mock(DiscordAPI::class);
        $apiMock->shouldReceive('sendMessageToChannel')
                ->once()
                ->with('Test message');

        $service = new DiscordService($apiMock);

        $dto = new MessageDTO('Test message');

        $service->sendMessage($dto);
    }

    /** @test */
    public function it_logs_and_throws_when_api_fails()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unable to send message to discord channel');

        $apiMock = Mockery::mock(DiscordAPI::class);
        $apiMock->shouldReceive('sendMessageToChannel')
                ->once()
                ->andThrow(new \Exception('Unable to send message'));

        $service = new DiscordService($apiMock);

        $dto = new MessageDTO('fail');

        $service->sendMessage($dto);
    }
}
