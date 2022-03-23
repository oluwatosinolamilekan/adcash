<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientStockTest extends TestCase
{
    use WithFaker;

    public function test_get_client_stocks()
    {
        $response= $this->get('api/client-stock/index');

        $response->assertStatus(200);
    }

    public function test_crate_client_stock()
    {
        $data = [
            'name' => $this->faker->name,
            'client_id' =>  Stock::inRandomOrder()->take(1)->first()->id,
            'stock_id' =>  Client::inRandomOrder()->take(1)->first()->id,
            'volume' => 'required',
            'unit_price' => $this->faker->randomNumber(2)
        ];

        $this->json('post','api/client-stock/store', $data)->assertStatus(201);
    }
}
