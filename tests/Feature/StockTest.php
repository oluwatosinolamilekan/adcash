<?php

namespace Tests\Feature;

use App\Models\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StockTest extends TestCase
{
    use WithFaker;

    public function test_get_stocks()
    {
        $response= $this->get('api/stock/index');

        $response->assertStatus(200);
    }

    public function test_create_stock()
    {
        $data = [
          'name' => $this->faker->name,
          'unit_price' => $this->faker->randomNumber(2)
        ];

        $this->json('post','api/stock/store', $data)->assertStatus(201);
    }
    public function test_update_stock()
    {
        $data = [
            'unit_price' => $this->faker->randomNumber(2)
        ];
        $stock = Stock::first();
        $this->json('put','api/stock/update/'.$stock->id, $data)->assertStatus(200);
    }

    public function test_delete_stock()
    {
        $stock = Stock::first();
        $this->json('delete','api/stock/delete/'.$stock->id)->assertStatus(200);
    }
}
