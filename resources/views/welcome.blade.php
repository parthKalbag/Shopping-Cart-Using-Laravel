@extends('layouts.app')
@section('content')
    @empty ($products)
        <div class="alert alert-warning">
            The list of products is empty
        </div>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endempty
@endsection
