<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    private $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    public function create()
    {
        $cart = $this->cartService->getFromCookie();
        if (!isset($cart) || $cart->products->isEmpty()) {
            return redirect()->back()->withErrors('Your Cart is Empty');
        }
        return view('orders.create')->with(['cart' => $cart]);
    }

    public function store(Request $request) {
        return DB::transaction(function() use($request) {
            $user = $request->user();
            $order = $user->orders()->create(['status' => 'pending']);

            $cart = $this->cartService->getFromCookie();
            $cartProductsWithQuantity = $cart->products->mapWithKeys(function ($product) {
                $quantity = $product->pivot->quantity;
                
                if($product->stock < $quantity) {
                    throw ValidationException::withMessages(['cart' => "There is not enough stock for the quantity you desire for {$product->title}"]);
                }
                
                $product->decrement('stock', $quantity);
                $element[$product->id] = ['quantity' => $quantity];
                return $element;
            });
            
            $order->products()->attach($cartProductsWithQuantity->toArray());

            return redirect()->route('orders.payments.create', ['order' => $order->id]);
        }, 5);
    }

}
