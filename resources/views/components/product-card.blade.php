<div class="card mt-3">
    <img class="card-img-top" alt="{{$product->title}}" height="500" src="{{'https://' . $product->images->first()->path}}" />
    <div class="card-body">
        <h4 class="text-right"><strong>$ {{$product->price}}</strong></h4>
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text"><strong>{{$product->stock}} left</strong></p>
    </div>
</div>
