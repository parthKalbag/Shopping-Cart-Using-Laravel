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
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

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
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        $product = Product::create(request()->all());

        if (request()->stock == 0 && request()->status == 'available') {
            session()->flash('error', 'If available it must have stock');
            return redirect()->back();
        }

        return redirect()->route('products.index');
    }
}
