<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

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
        Products::create($request->all());
        return redirect()->route('user.profile');
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->route('user.profile');
    }
}


