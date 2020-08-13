<div class="card" style="height: 95%;margin-top: 10px;margin-bottom: 10px">
    <img class="card-img-top" alt="{{$product->title}}" height="500" src="{{'https://' . $product->images->first()->path}}" />
    <div class="card-body">
        <h4 class="text-right"><strong>$ {{$product->price}}</strong></h4>
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text"><strong>{{$product->stock}} left</strong></p>
    </div>
    @if(isset($cart))
        <form method="POST" class="d-inline ml-2 mb-2" action="{{route('products.carts.destroy', ['product' => $product->id, 'cart' => $cart->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Remove from Cart</button>
        </form>
    @else
    <form method="POST" class="d-inline ml-2 mb-2" action="{{route('products.carts.store', ['product' => $product->id])}}">
        @csrf
        <button type="submit" class="btn btn-success">Add To Cart</button>
    </form>
    @endif
</div>
