@extends('layouts.app')

@section('content')
    <h3>You are in the list of products</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->products as $product)
                    <tr>
                        <td>{{$product->title}}<img src="{{'https://' . $product->images->first()->path}}" width="100" alt="{{$product->title}}"> </td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->pivot->quantity}}</td>
                        <td>{{$product->pivot->quantity * $product->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
