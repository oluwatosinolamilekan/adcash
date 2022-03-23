<?php

namespace App\Actions\Stock;

use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class CreateStock
{
    public function action($request)
    {
        DB::beginTransaction();
        $stock = Stock::create($request);
        DB::commit();
        return $stock;
    }
}
