@extends('layout.layout')
<link rel="stylesheet" href="/css/product_edit.css">

@section('content')
<div class="form-edit">
<form action="{{ route('product.update', $product->id) }}" method="post"  enctype="multipart/form-data" class="form">
    @csrf
    @method('put')
    <!-- Cabeçalho do modal -->
    <div >
      <h4 >Adicionar um novo produto</h4>
    </div>
    <!-- Corpo do modal -->
    <div >
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="exampleForm">Nome do produto</label>
            <input type="text" name="name" class="form-control" maxlength="100" id="ProdName" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="ExampleForm">Descrição do produto</label>
            <input type="text" class="form-control" maxlength="200" name="description" id="ProdDesc" value="{{$product->description}}">
        </div>
        <div class="form-group">
            <label for="ExampleForm">Tipo de produto</label>
            <select name="type" id="ProdType" class="form-select" s>
                <option value="japones">Comida Japonesa</option>
                <option value="acessorios">Acessorio</option>
                <option value="brasileira">Comida Brasileira</option>
                <option value="brinquedos">Brinquedo</option>
             </select>
        </div>
        <div class="form-group">
            <label for="ExampleForm">Imagem do produto</label>
            <br>
            <p>Imagem atual:</p>
            <img src="{{asset('storage/' . $product->image)}}" alt="">
            <br>
            <input type="file" class="form-control" name="image" id="ProdImg" value="{{$product->image}}">
        </div>
        <input type="hidden" name="store_id" id='StoreId' value="{{ $product->store_id }}">
        <div class="form-group">
            <label for="ExampleForm">Preço do produto (ex: 53.55 para R$53,55)</label>
            <input type="number" step="0.10" class="form-control" name="price" id="ProdPrice" value="{{$product->price}}">
        </div>
    </div>

    <br>
    <!-- Rodapé do modal-->
    <div>

      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
</div>
@endsection
