<?php

namespace App\Actions\Stock;

use App\Models\Stock;

class DeleteStock
{
    protected function action($id)
    {
        return Stock::findOrFail($id);
    }
}
