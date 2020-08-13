<?php

namespace App\Services;

use App\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Collection;

class CartService {
    private $cookieName = 'cart';

    public function getFromCookieOrCreate() {
        $cart = $this->getFromCookie();
        return $cart ?? Cart::create();
    }

    public function makeCookie(Cart $cart) {
        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);
    }

    public function countProducts() {
        $cart = $this->getFromCookie();

        if ($cart != null) {
            return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;
    }

    public function getFromCookie() {
        $cartId = Cookie::get($this->cookieName);
        return Cart::find($cartId);
    }
}
