<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    /** @use HasFactory<\Database\Factories\PizzaFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'url'
    ];

    public function orderPizzas() 
    {
        return $this->hasMany(OrderPizza::class); 
    }

}
