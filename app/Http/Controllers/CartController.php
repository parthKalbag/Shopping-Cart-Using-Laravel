<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cart = $this->cartService->getFromCookieOrCreate();
        return view('carts.index')->with(['cart' => $cart]);
    }

}
