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
        User::truncate();
        Stock::truncate();
        Client::truncate();
        ClientStock::truncate();

        User::factory(10)->create();
        Stock::factory(30)->create();
        Client::factory(10)->create();
        ClientStock::factory(25)->create();
    }
}
