@extends('layout.layout')
<link rel="stylesheet" href="/css/store_products.css">

@section('content')

<div class="store-inf">
    <img src="{{asset("$store->image")}}" alt="">
    <h1>{{$store->name}}</h1>
    <h2>{{$store->description}}</h2>
    <hr width="75%">
</div>

@if ($products)
<div class="products container">
    <div class="row">
        @foreach ($products as $product)
            <div class="product col-3">
                <img src="{{asset("$product->image")}}" alt="">
                <div class="prod-inf">
                        <h1>{{$product->name}}</h1>
                        <h2>{{$product->description}}</h2>
                    <p>Preço: R$ {{ number_format($product->price, 2) }}</p>
                    <div class="buttons">
                        <button class="btn btn-success">Comprar</button>
                        <button class="btn btn-primary" onclick="window.location.href='/products/{{$store->id}}/{{$product->id}}'">informação</button>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
@endif

@endsection
