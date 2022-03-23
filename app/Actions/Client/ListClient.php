<?php

namespace App\Actions\Client;

use App\Models\Client;

class ListClient
{
    public function action()
    {
        return Client::paginate(20);
    }
}
