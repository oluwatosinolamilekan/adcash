<?php

namespace App\Actions\Client;

use App\Models\ClientStock;
use Illuminate\Support\Facades\DB;

class CreateClientStock
{
    public function action($request)
    {
        DB::beginTransaction();
        $clientStock = ClientStock::create($request);
        DB::commit();
        return $clientStock;
    }
}
