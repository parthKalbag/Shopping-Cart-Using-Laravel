<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\ProductRequest;
use App\PanelProduct as Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index')->with(['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }

    public function show(Product $product) {
        return view('products.show')->with(['product' => $product]);
    }

    public function edit(Product $product) {
        return view('products.edit')->with(['product' => $product]);
    }

    public function update(Product $product, ProductRequest $request) {
        $product->update($request->validated());
        return redirect()->route('products.index')->withSuccess("Product with id {$product->id} was updated");
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')->withSuccess("Product with id {$product->id} was removed");
    }

    public function store(ProductRequest $request) {
        $product = Product::create($request->validated());
        return redirect()->route('products.index')->withSuccess("New product with id {$product->id} was created.");
    }
}
