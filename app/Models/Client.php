<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function client_stocks()
    {
        return $this->hasMany(ClientStock::class, 'client_id');
    }

    public function sumClientStock()
    {
//        dd($this->client_stocks()->stock()->each( function ($stock, $key){
//            dd($stock);
//            return $stock->sum('unit_price');
//        }));
//        return $this->client_stocks()->with('stock');
        return 1000;
    }

    public function gain()
    {

    }

    public function loss()
    {

    }
}
