@extends('layouts.master')
@section('content')
    <h1>Edit a Product</h1>
    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" value="{{$product->title}}" required>
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" value="{{$product->description}}" id="description" required>
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input class="form-control" type="number" name="price" id="price" value="{{$product->price}}" min="1.00" step="0.01" required>
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input class="form-control" type="number" name="stock" id="stock" value="{{$product->stock}}" min="0" required>
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select class="custom-select" name="status" id="status">
                <option value="">Select...</option>
                <option value="available" {{ $product->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="unavailable" {{ $product->status == 'available' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
@endsection
