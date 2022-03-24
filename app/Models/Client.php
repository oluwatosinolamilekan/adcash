<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    /**
     * @var array
     */

    protected $fillable = ['name'];

    public function client_stocks(): HasMany
    {
        return $this->hasMany(ClientStock::class, 'client_id');
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(ClientStock::class, 'stock_id');
    }

    public function sumClientStock()
    {
        return 1000;
    }

    public function gain()
    {
//        dd($this->stocks()->volume);
    }

    public function loss()
    {

    }
}
