<div class="card" style="height: 95%;margin-top: 10px;margin-bottom: 10px;">
    <div id="carousel{{ $product->id }}" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach ($product->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100 card-img-top" src="{{'https://' . $image->path }}" alt="" height="500">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel{{ $product->id }}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carousel{{ $product->id }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div class="card-body">
        <h4 class="text-right"><strong>$ {{$product->price}}</strong></h4>
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text"><strong>{{$product->stock}} left</strong></p>
    </div>
    @if(isset($cart))
        <p class="card-text ml-4">Quantity: {{$product->pivot->quantity}} <br> Total:  <strong>{{$product->total}}</strong> </p>
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
