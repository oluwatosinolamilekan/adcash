<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Client extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return HasMany
     */
    public function client_stocks(): HasMany
    {
        return $this->hasMany(ClientStock::class, 'client_id');
    }

    /**
     * @return BelongsToMany
     */
    public function stocks(): BelongsToMany
    {
        return $this->belongsToMany(Stock::class,'client_stocks');
    }

    /**
     * @return HasOneThrough
     */
    public function stock(): HasOneThrough
    {
        return $this->hasOneThrough(
            Stock::class,
            ClientStock::class,
            'stock_id',
            'id'
        );
    }

    /**
     * @return HasOneThrough
     */
    public function client(): HasOneThrough
    {
        return $this->hasOneThrough(
            Client::class,
            ClientStock::class,
            'client_id',
            'id'
        );
    }
}
