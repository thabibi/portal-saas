<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Product;
use App\Http\Controllers\ProductController;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $products = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
                ->latest()
                ->paginate(10)
                ->withQueryString();

        //products = Product::latest()->get();

        return view('products.index', compact('products'));
    }

    public function store (Request $request)
    {

        Product::create([
            'business_id' => session ('business_id'),
            'name' => $request->name,
            'price' =>$request->price,
            'stock' => $request->stock,

        ]);
        return redirect()->route('products.index')
            ->with('success','Product Berhasil Dibuat');
    }
}
