<?php

namespace App\Http\Controllers;

use App\Exports\ProductsDataExport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportExcel()
    {
        abort_if(Gate::denies('export product'), 403);
        return Excel::download( new ProductsDataExport, 'products-data.xlsx');
    }
}
