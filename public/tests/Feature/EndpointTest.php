<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EndpointTest extends TestCase
{
    public function testGetScore()
    {
        $response = $this->json('GET', '/scores?user_type=admin');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'value',
                        'username',
                        'user_type'
                    ]
                ]
            ]);
    }

    public function testPostScore()
    {
        $mock = [
            'value' => 12.345,
            'username' => 'test-user',
            'user_type' => 'admin'
        ];

        $response = $this->json('POST', '/scores', $mock);

        $response
            ->assertStatus(200)
            ->assertJson($mock);
    }
}
