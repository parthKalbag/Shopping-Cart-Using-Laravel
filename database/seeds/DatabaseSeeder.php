<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\User;
use App\Order;
use App\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 20)->create();
        $orders = factory(Order::class, 10)->make()->each(function ($order) use ($users){
            $order->customer_id = $users->random()->id;
            $order->save();
            $payment = factory(Payment::class)->make();
            $order->payment()->save($payment);
        });
        $products = factory(Product::class, 50)->create();
    }
}
