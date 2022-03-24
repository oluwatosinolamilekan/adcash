<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Client;
use App\Models\ClientStock;
use App\Models\Post;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Stock::truncate();
        Client::truncate();
        ClientStock::truncate();

        Stock::factory(4)->create();
        Client::factory(4)->create();
        ClientStock::factory(3)->create();
    }
}
