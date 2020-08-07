@extends('layouts.master')
@section('content')
    <h4>{{$product->title}} {{$product->id}}</h4>
    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
    <p>{{$product->stock}}</p>
    <p>{{$product->status}}</p>
@endsection
