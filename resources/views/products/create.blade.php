@extends('layouts.app')
@section('content')
    <h1>Create a Product</h1>
    <form method="POST" action="{{ route('products.store')  }}">
        @csrf
        <div class="form-row">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}" required>
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" id="description" value="{{old('description')}}" required>
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input class="form-control" type="number" name="price" id="price" min="1.00" step="0.01" value="{{old('price')}}">
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input class="form-control" type="number" name="stock" id="stock" min="0" value="{{old('stock')}}" required>
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select class="custom-select" name="status" id="status">
                <option value="" selected>Select...</option>
                <option value="available" {{ old('status') == 'available' ? 'selected' : ''}}>Available</option>
                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : ''}}>Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
@endsection
