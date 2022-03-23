<?php

namespace App\Actions\Client;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

class CreateClient
{
    public function action($request)
    {
        DB::beginTransaction();
        $client = new Client();
        $client->name = $request['name'];
        $client->save();
        DB::commit();
        return $client;
    }
}
