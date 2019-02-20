<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EndpointTest extends TestCase
{
    public function testGetScore()
    {
        $response = $this->json('GET', '/scores');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'value',
                        'username',
                        'user_type'
                    ]
                ],
                'links' => [
                    'first',
                    'last',
                    'prev',
                    'next'
                ],
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'path',
                    'per_page',
                    'to',
                    'total'
                ]
            ]);
    }

    public function testPostScore()
    {
        $mock = [
            'value' => 12.345,
            'username' => 'test-user'
        ];
        $userType = 'student';

        $response = $this->json('POST', '/scores?user_type=' . $userType, $mock);

        $mock += ['user_type' => $userType];

        $response
            ->assertStatus(200)
            ->assertJson($mock);
    }
}
