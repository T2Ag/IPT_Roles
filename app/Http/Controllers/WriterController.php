<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('writer.index', ['products' => $products]);
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validatedData);

        return redirect()->route('writer.product.index')->with('success', 'Product updated successfully.');
    }

}
