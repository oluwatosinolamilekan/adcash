<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientStockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stock_id' =>  Stock::inRandomOrder()->take(1)->first()->id,
            'client_id' =>  Client::inRandomOrder()->take(1)->first()->id,
            'volume' =>  rand(1,99)
        ];
    }
}
