<?php
namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ProductExport implements FromView
{

    public function view(): View
    {
        return view('admin.exports.products', [
            'products' => Product::all()
        ]);
    }

}