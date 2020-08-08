@extends('layouts.master')
@section('content')
    <h1>Create a Product</h1>
    <form method="POST" action="{{ route('products.store')  }}">
        @csrf
        <div class="form-row">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" id="description">
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input class="form-control" type="number" name="price" id="price" min="1.00" step="0.01">
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input class="form-control" type="number" name="stock" id="stock" min="0">
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select class="custom-select" name="status" id="status">
                <option value="">Select...</option>
                <option value="available">Available</option>
                <option value="unavailable">Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
@endsection
