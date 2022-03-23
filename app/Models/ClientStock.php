<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientStock extends Model
{
    use HasFactory;

    protected $fillable = ['client_id','stock_id','volume'];

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class,'stock_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
