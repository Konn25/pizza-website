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

        Pizza::factory()->create([
            'name' => 'Margherita pizza',
            'description' => 'The Margherita pizza is a classic Italian favorite, topped with fresh tomato sauce, 
            creamy mozzarella cheese, and fragrant basil leaves. Simple yet delicious, 
            it represents the colors of the Italian flag and is loved for its light, fresh flavor.',
            'price' => 31.39,
            'url' => 'images/pizzas/margherita-pizza.jpg'
        ]);

        Pizza::factory()->create([
            'name' => 'Pepperoni pizza',
            'description' => "The Pepperoni pizza is a popular choice, featuring a golden crust topped with rich tomato sauce,
             melted mozzarella cheese, and spicy pepperoni slices. 
             Savory and slightly spicy, it's a favorite for pizza lovers everywhere.",
            'price' => 33.76,
            'url' => 'images/pizzas/pepperoni-pizza.jpg'
        ]);

        $topping = Topping::factory()->create([
            'name' => 'Cheddar',
            'description' => 'For those who really love cheddar.',
            'price' => 2.59,
            'url' => 'images/toppings/not_available.jpg'
        ]);

        Topping::factory()->create([
            'name' => 'Bacon',
            'description' => 'Crispy, smoky bacon adds a rich and savory flavor to any pizza',
            'price' => 2.90,
            'url' => 'images/toppings/not_available.jpg'
        ]);

        Topping::factory()->create([
            'name' => 'Ham',
            'description' => 'Tender slices of ham bring a mild, slightly sweet taste.',
            'price' => 2.90,
            'url' => 'images/toppings/not_available.jpg'
        ]);

        Topping::factory()->create([
            'name' => 'Tomato slices',
            'description' => 'Fresh tomato slices add juiciness and a bright, tangy flavor',
            'price' => 0.95,
            'url' => 'images/toppings/tomato_slices.png'
        ]);

        Topping::factory()->create([
            'name' => 'Mushrooms',
            'description' => 'Earthy mushrooms provide a savory, umami-rich touch.',
            'price' => 1.25,
            'url' => 'images/toppings/not_available.jpg'
        ]);

        Topping::factory()->create([
            'name' => 'Pineapple',
            'description' => 'Sweet pineapple chunks add a tropical, juicy twist.',
            'price' => 1.0,
            'url' => 'images/toppings/not_available.jpg'
        ]);

        Topping::factory()->create([
            'name' => 'BBQ sauce',
            'description' => 'Smoky and tangy BBQ sauce gives a bold, zesty flavor.',
            'price' => 2.43,
            'url' => 'images/toppings/bbq.png'
        ]);

        Topping::factory()->create([
            'name' => 'Eggs',
            'description' => 'A baked eggs on top adds creaminess and a unique texture.',
            'price' => 1.0,
            'url' => 'images/toppings/eggs.jpg'
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
