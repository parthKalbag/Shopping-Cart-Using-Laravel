<?php

namespace App\Services;

use App\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService {
    private $cookieName = 'cart';
    public function getFromCookieOrCreate() {
        $cartId = Cookie::get('cart');

        $cart = Cart::find($cartId);

        return $cart ?? Cart::create();
    }

    public function makeCookie(Cart $cart) {
        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);
    }

}
