<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index')->with(['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }

    public function show($product) {
        $products = Product::findOrFail($product);
        return view('products.show')->with(['product' => $products]);
    }

    public function edit($product) {
        $product = Product::findOrFail($product);
        return view('products.edit')->with(['product' => $product]);
    }

    public function update($product) {
        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()->route('products.index');
    }

    public function destroy($product) {
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function store() {
        $product = Product::create(request()->all());
        return redirect()->route('products.index');
    }
}
