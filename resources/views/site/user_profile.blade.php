@extends('layout.layout')
<link rel="stylesheet" href="/css/user_profile.css">

@section('content')
    <div class="store-inf">
        <img src="{{asset("$store->image")}}" alt="">
        <h1>{{$store->name}}</h1>
        <h2>{{$store->description}}</h2>
        <hr width="75%">
    </div>
    @if (Auth::user()->acc_type == 2)
    <div class="products container">
        <div class="row">
            @foreach ($products as $product)
                <div class="product col">
                    <img src="{{asset("$product->image")}}" alt="">
                    <div class="prod-inf">
                            <h1>{{$product->name}}</h1>
                            <h2>{{$product->description}}</h2>
                        <p>Preço: R$ {{ number_format($product->price, 2) }}</p>
                        <div class="buttons">
                            <button class="btn btn-success">Comprar</button>
                            <button class="btn btn-primary" onclick="window.location.href='/products/{{$store->id}}/{{$product->id}}'">informação</button>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="adicionar col">
                <a class="bg-success" data-toggle="modal" data-target="#addProduct" href="javascript:void(0)"><img src="{{asset("storage/adicionar.png")}}" alt=""></a>
            </div>
        </div>
    </div>
    @endif


@endsection


