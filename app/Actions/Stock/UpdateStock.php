<?php

namespace App\Actions\Stock;

use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class UpdateStock
{
    public function action($request, $id)
    {
        DB::beginTransaction();
        $stock = Stock::where('id', $id)->firstOrFail();;
//        $stock->unit_price = $request->unit_price;
//        $stock->save();
        if(!$stock->update($request)){
            throw new RuntimeException('Unable to update the stock.');
        }
        DB::commit();
        return $stock;
    }
}
