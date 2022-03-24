<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientStock extends Model
{
    use HasFactory;

    /**
     * @var array
     */

    protected $fillable = ['client_id','stock_id','volume'];

    /**
     * @return BelongsTo
     */

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class,'stock_id');
    }

    /**
     * @return BelongsTo
     */

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
