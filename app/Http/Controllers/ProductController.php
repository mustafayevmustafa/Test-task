<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdoctRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->authorizeResource(Product::class);
    }

    public function index()
    {
      return view('Admin.products.index')->with([
                 'products' => Product::paginate(10)
              ]);
    }

    public function export()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }

    public function create()
    {
        return view('Admin.products.edit')->with([
             'action' => route('products.store'),
             'method' => null,
             'data'   => null,
        ]);
    }


    public function store(ProdoctRequest $request) : RedirectResponse
    {
       $validated = $request->validated();
       $product   = $request->user()->products()->create($validated);

//       $validated['user_id'] = auth()->id();
//       dd($validated);
//       $product = Product::create($validated);

       return redirect()
                ->route('products.index')
                ->with('success', "Product {$product->getAttribute('name')} created successfully! ");
    }

    public function show(Product $product)
    {
        return view('Admin.products.edit')->with([
           'method' => null,
           'action' => null,
           'data' =>$product
        ]);
    }

    public function edit(Product $product)
    {
         return view('Admin.products.edit')->with([
             'action' => route('products.update', $product),
             'method' => 'PUT',
             'data' => $product,
         ]);
    }


    public function update(ProdoctRequest $request, Product $product)
    {
       $validate = $request->validated();
       $product->update($validate);

       return redirect()->route('products.index')->with('success', "Product {$product->getAttribute('name')} updated");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                ->withSuccess(__('Product delete successfully.'));


    }
}
