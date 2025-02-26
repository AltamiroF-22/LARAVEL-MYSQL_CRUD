<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);

        // Garantir que o preço tenha duas casas decimais
        $data['price'] = number_format($data['price'], 2, '.', '');

        Product::create($data);

        return redirect(route('product.index'))->with('success', 'Product Created Successfully!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);

        // Garantir que o preço tenha duas casas decimais
        $data['price'] = number_format($data['price'], 2, '.', '');

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully!');
    }
}
