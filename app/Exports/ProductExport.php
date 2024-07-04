<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $products;

    public function __construct()
    {
        $this->products = Product::all();
    }

    public function view() : View
    {
        return view('user.export',[
            'products' => $this->products
        ]);
    }
}
