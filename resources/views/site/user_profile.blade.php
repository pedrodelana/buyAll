@extends('layout.layout')
<link rel="stylesheet" href="/css/user_profile.css">

@section('content')
    <div class="store-inf">
        <img src="{{asset("$store->image")}}" alt="">
        <h1>{{$store->name}}</h1>
        <h2>{{$store->description}}</h2>
        <hr width="75%">
    </div>
    @if (Auth::user()->acc_type === '2')
    <div class="products container">
        <div class="row">
            @foreach ($products as $product)
                <div class="product col">
                    <img src="{{asset("storage/{$product->image}")}}" alt="">
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

      <!-- Modal -->
      <div id="addProduct" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Conteúdo do modal-->
            <div class="modal-content">
                <form action="{{ route('products.store') }}" method="post"  enctype="multipart/form-data" >
                    @csrf
                    <!-- Cabeçalho do modal -->
                    <div class="modal-header">
                      <h4 class="modal-title">Adicionar um novo produto</h4>
                    </div>
                    <!-- Corpo do modal -->
                    <div class="modal-body">
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
                            <input type="text" name="name" class="form-control" maxlength="100" id="ProdName">
                        </div>
                        <div class="form-group">
                            <label for="ExampleForm">Descrição do produto</label>
                            <input type="text" class="form-control" maxlength="200" name="description" id="ProdDesc">
                        </div>
                        <div class="form-group">
                            <label for="ExampleForm">Tipo de produto</label>
                            <select name="type" id="ProdType" class="form-select">
                                <option value="japones">Comida Japonesa</option>
                                <option value="acessorios">Acessorio</option>
                                <option value="brasileira">Comida Brasileira</option>
                                <option value="brinquedos">Brinquedo</option>
                             </select>
                        </div>
                        <div class="form-group">
                            <label for="ExampleForm">Imagem do produto</label>
                            <input type="file" class="form-control" name="image" id="ProdImg">
                        </div>
                        <input type="hidden" name="store_id" id='StoreId' value="{{ $store->id }}">
                        <div class="form-group">
                            <label for="ExampleForm">Preço do produto (ex: 53.55 para R$53,55)</label>
                            <input type="number" step="0.10" class="form-control" name="price" id="ProdPrice">
                        </div>
                    </div>

                    <!-- Rodapé do modal-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
        </div>
      </div>
      </div>
@endsection


