<?php

namespace App\Actions\Stock;

use App\Models\Stock;

class ListStock
{
    public function action()
    {
        return Stock::latest()->paginate(10);
    }
}
