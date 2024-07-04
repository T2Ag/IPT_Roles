<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('create product'), 403);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        abort_if(Gate::denies('edit product'), 403);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('delete product'), 403);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
