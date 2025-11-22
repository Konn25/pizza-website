<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function orderPizzas() 
    {
        return $this->hasMany(OrderPizza::class); 
    }

}
