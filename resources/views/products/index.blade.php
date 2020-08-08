@extends('layouts.app')

@section('content')
    <h3>You are in the list of products</h3>
    <a class="btn btn-link btn-success mb-3 ml-2 text-decoration-none" href="{{route('products.create')}}"><span class="text-white">Create</span></a>

    @empty ($products)
        <div class="alert alert-warning">
            The list of products is empty
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th>{{$product->id}}</th>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{ucfirst($product->status)}}</td>
                            <td>
                                <a class="btn btn-link btn-primary" href="{{route('products.show', ['product' => $product->id])}}"><span class="text-white">Show</span></a>
                                <a class="btn btn-link btn-secondary" href="{{route('products.edit', ['product' => $product->id])}}"><span class="text-white">Edit</span></a>
                                <form class="d-inline" method="POST" action="{{route('products.destroy', ['product' => $product->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-danger"><span class="text-white">Delete</span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection
