@extends('layouts.app')

@section('content')
    <h3>Order Details</h3>
    <h4 class="text-center"><strong>Grand Total: $ {{$cart->total}}</strong></h4>
    <div class="text-center mb-3">
        <form class="d-inline" method="POST" action="{{ route('orders.store')  }}">
            @csrf
            <button type="submit" class="btn btn-success">Confirm Order</button>
        </form>
    </div>
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
                        <td>{{$product->total}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
