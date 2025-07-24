<?php

namespace Tests\Feature;

use App\DTO\MessageDTO;
use App\Services\DiscordService;
use Mockery;
use Tests\TestCase;

class DiscordControllerTest extends TestCase
{
    /** @test */
    public function it_sends_a_discord_message_and_redirects_back()
    {
        $mock = Mockery::mock(DiscordService::class);
        $this->app->instance(DiscordService::class, $mock);

        $mock->shouldReceive('sendMessage')
            ->once()
            ->withArgs(function (MessageDTO $dto) {
                return $dto->getMessage() === 'Test message';
            });

        $response = $this->post(route('discord.handle.submit'), [
            'message' => 'Test message',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'message sent succesfully');
    }

    /** @test */
    public function it_validates_message_is_required()
    {
        $response = $this->post(route('discord.handle.submit'), []);

        $response->assertSessionHasErrors('message');
    }
}
