<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderPizza;
use App\Models\OrderPizzaTopping;
use App\Models\Pizza;
use App\Models\User;
use App\Models\Topping;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'phone' => '+36707778022',
            'email' => 'test@example.com',
        ]);

        User::factory(10)->create();

        Order::factory(3)->create();

        $order = Order::factory()->create([
            'name' => 'Test User',
            'phone' => '+36707778022',
            'email' => 'test@example.com',
        ]);

        Pizza::factory(3)->create();
        $pizza = Pizza::factory()->create([
            'name' => 'Meat Lover',
            'description' => 'A hearty feast for carnivores! This pizza is piled high with savory pepperoni, 
                smoky bacon, juicy sausage, and tender ham, all atop a rich tomato sauce 
                and a generous layer of melted mozzarella cheese. Baked to golden perfection, 
                every bite delivers a satisfying blend of flavors and textures that meat enthusiasts will crave. 
                Perfect for sharing—or not!',
            'price' => 35.5,
            'url' => 'images/pizzas/meat-lover-pizza.jpg'
        ]);

        Topping::factory(3)->create();
        $topping = Topping::factory()->create([
            'name' => 'Cheese',
            'description' => 'For those who really love cheese',
            'price' => 2.59,
            'url' => 'images/pizzas/cheese.jpg'
        ]);

        $orderPizza = OrderPizza::factory()->create([
            'order_id' => $order->id,
            'pizza_id' => $pizza->id

        ]);

        OrderPizzaTopping::factory()->create([
            'order_pizza_id' => $orderPizza->id,
            'topping_id' => $topping->id
        ]);

    }
}
