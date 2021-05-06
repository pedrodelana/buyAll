<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::get();
        return view('site.stores_view', compact('stores'));
    }

    public function show($id)
    {
        $store = Store::findOrFail($id);

        $products = $store->products()->get();

        return view('site.store_products', compact('store', 'products'));
    }
}
