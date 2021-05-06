@extends('layout.layout')
<link rel="stylesheet" href="/css/product_view.css">

@section('content')

<div class="product-view">
    <img src="{{asset("$product->image")}}" alt="">
    <h1>{{$product->name}}</h1>
    <h2>{{$product->description}}</h2>
    <p>Preço: {{$product->price}}</p>
    <div class="buttons">
        <button class="btn btn-success">Comprar</button>
    </div>
</div>

@endsection

