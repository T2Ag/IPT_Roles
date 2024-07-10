<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
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

        $product = Product::create($validatedData);

        $log_entry = 'Added a new product ' . $product->name . ' with the ID# of ' . $product->id;
        event(new UserLog($log_entry));

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

        $log_entry = 'Updated the product ' . $product->name . ' with the ID# of ' . $product->id;
        event(new UserLog($log_entry));

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('delete product'), 403);

        $product->delete();

        $log_entry = 'Deleted the product ' . $product->name . ' with the ID# of ' . $product->id;
        event(new UserLog($log_entry));

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function exportExcel()
    {
        abort_if(Gate::denies('export product'), 403);
        return Excel::download( new ProductsDataExport, 'products-data.xlsx');
    }

    public function logs()
    {
        abort_if(Gate::denies('visit logs'), 403);
        $logs = auth()->user()->logs;
        return view('product.log', compact('logs'));
    }
}
