<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\User;
use App\Order;
use App\Cart;
use App\Payment;
use App\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 20)->create()->each(function ($user) {
            $image = factory(Image::class)->states('user')->make();
            $user->image()->save($image);
        });

        $orders = factory(Order::class, 10)->make()->each(function ($order) use ($users){
            $order->customer_id = $users->random()->id;
            $order->save();
            $payment = factory(Payment::class)->make();
            $order->payment()->save($payment);
        });

        $carts = factory(Cart::class, 20)->create();
        $products = factory(Product::class, 50)->create()->each(function ($product) use ($orders, $carts) {
            $order = $orders->random();
            $order->products()->attach([$product->id => ['quantity' => mt_rand(1, 3)]]);
            $cart = $carts->random();
            $cart->products()->attach([ $product->id => ['quantity' => mt_rand(1, 3)] ]);
            $images = factory(Image::class, mt_rand(2, 4))->make();
            $product->images()->saveMany($images);
        });
    }
}
