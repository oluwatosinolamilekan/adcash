<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use WithFaker;

    public function test_get_clients()
    {
        $response= $this->get('api/client/index');

        $response->assertStatus(200);
    }

    public function test_create_client()
    {
        $data = [
            'name' => $this->faker->name,
        ];
        $this->json('post','api/client/store', $data)->assertStatus(201);
    }
}
