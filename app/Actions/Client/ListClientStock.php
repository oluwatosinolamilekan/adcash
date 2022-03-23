<?php

namespace App\Actions\Client;

use App\Models\ClientStock;

class ListClientStock
{
    public function action()
    {
        return ClientStock::latest()->paginate(20);
    }
}
