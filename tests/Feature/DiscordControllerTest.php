<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use App\DTO\MessageDTO;
use App\Services\DiscordService;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
                 return $dto->getMessage() === 'Testbericht';
             });

        $response = $this->post(route('discord.handle.submit'), [
            'message' => 'Testbericht',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('succes', 'bericht is verzonden');
    }

    /** @test */
    public function it_validates_message_is_required()
    {
        $response = $this->post(route('discord.handle.submit'), []);

        $response->assertSessionHasErrors('message');
    }
}
