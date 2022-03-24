<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Stock extends Model
{
    use HasFactory;

    /**
     * @var array
     */

    protected $fillable = ['name','unit_price'];

    /**
     * @return HasManyThrough
     */
    public function clients(): HasManyThrough
    {
        return $this->hasManyThrough(
            Client::class,
            ClientStock::class,
            'client_id',
            'id'
        );
    }

}
