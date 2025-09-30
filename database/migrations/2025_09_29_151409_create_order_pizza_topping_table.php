<?php

use App\Models\Topping;
use App\Models\Order;
use App\Models\OrderPizza;
use App\Models\Pizza;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_pizza_topping', function (Blueprint $table) { 
            $table->id(); 
            $table->foreignIdFor(OrderPizza::class); 
            $table->foreignIdFor(Topping::class); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_pizza_topping');
    }
};
