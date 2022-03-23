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

}
