@extends('layout.layout')
<link rel="stylesheet" href="/css/user_perfil.css">

@section('content')

    {{var_dump(Auth::user())}}
    @if (Auth::user()->acc_type === 2)
        <div class="product-view">
            <img src="{{asset("$product->image")}}" alt="">
            <h1>{{$product->name}}</h1>
            <h2>{{$product->description}}</h2>
            <p>Preço: {{$product->price}}</p>
            <div class="buttons">
                <button class="btn btn-success">Comprar</button>
            </div>
        </div>
    @endif
@endsection
