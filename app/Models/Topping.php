<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'url'
    ];

    public function orderPizzaToppings() 
    {
        return $this->hasMany(OrderPizzaTopping::class); 
    }
}
