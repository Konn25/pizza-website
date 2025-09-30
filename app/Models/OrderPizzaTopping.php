<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPizzaTopping extends Model
{
    use HasFactory;

    protected $table = 'order_pizza_topping';

    protected $fillable = [
        'order_pizza_id', 
        'topping_id'
    ];

    public function orderPizza()
    {
        return $this->belongsTo(OrderPizza::class);
    }

    public function topping()
    {
        return $this->belongsTo(Topping::class);
    }
    
}
