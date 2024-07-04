<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.index', ['products' => $products]);
    }

    public function exportExcel()
    {
        return Excel::download( new ProductExport, 'products-data.xlsx');

    }
}
