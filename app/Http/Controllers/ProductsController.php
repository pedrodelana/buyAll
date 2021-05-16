<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::get();
        return view('site.products_view', compact('products'));
    }

    public function show($id_store, $id_product)
    {
        $product = Products::findOrFail($id_product);
        $store = $product->store($id_store)->first();

        return view('/site/product_view', compact('product', 'store'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'max:200',
            'price' => 'required',
            'image' => 'required'
        ],[
            'name.required' => 'Nome obrigatório.',
            'price.required' => 'Necessário informar o preço.',
            'image.required' => 'Necessário enviar uma imagem',
        ]);

        $data = $request->all();

        if ($request->image)
        {
            $image = $request->file('image')->store('products');
            $data['image'] = $image;
        }

        Products::create($data);
        return redirect()->route('user.profile');
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);

        return view('site.product_edit', compact('product'));
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        if (Storage::exists($product->image))
        {Storage::delete($product->image);}
        $product->delete();
        return redirect()->route('user.profile');
    }
}


