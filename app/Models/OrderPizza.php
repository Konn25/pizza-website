<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPizza extends Model
{
    use HasFactory;

    protected $table = 'order_pizza';

    protected $fillable = [
        'order_id', 
        'pizza_id',
        'size',
        'status'
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function orderStatus(){
        return $this->belongsTo(OrderStatus::class, 'status', 'id');
    }

    public function orderPizzaToppings()
    {
        return $this->hasMany(OrderPizzaTopping::class);
    }
}
