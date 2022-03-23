<?php

namespace App\Actions\Client;

use App\Models\ClientStock;
use Illuminate\Support\Facades\DB;

class CreateClientStock
{
    public function action($request)
    {
        DB::beginTransaction();
        $clientStock = new ClientStock();
        $clientStock->client_id = $request['client_id'];
        $clientStock->stock_id = $request['stock_id'];
        $clientStock->volume = $request['volume'];
        $clientStock->save();
        DB::commit();
        return $clientStock;
    }
}
