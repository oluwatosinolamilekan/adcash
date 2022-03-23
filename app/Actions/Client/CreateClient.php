<?php

namespace App\Actions\Client;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

class CreateClient
{
    public function action($request)
    {
        DB::beginTransaction();
        $client =  Client::create($request);
        DB::commit();
        return $client;
    }
}
