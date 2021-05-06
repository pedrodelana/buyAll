@extends('layout.layout')
<link rel="stylesheet" href="/css/stores_view.css">
@section('content')

<div class="stores container-fluid">
    <div class="row">
        @if ($stores)
            @foreach ($stores as $store)
                <div class="store col">
                    <a href="/store/{{$store->id}}">
                        <img src="{{$store->image}}" alt="">
                        <div class="store-inf">
                            <h1>{{$store->name}}</h1>
                            <h2>{{$store->description}}</h2>
                    </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
