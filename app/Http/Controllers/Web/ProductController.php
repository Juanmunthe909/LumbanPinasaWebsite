<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function buah(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::where('category', 'buah')->where('title', 'like', '%' . $request->keyword . '%')->paginate(4);
            return view('pages.web.product.list', compact('products'));
        }
        return view('pages.web.product.main');
    }

    public function sayur(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::where('category', 'sayur')->where('title', 'like', '%' . $request->keyword . '%')->paginate(4);
            return view('pages.web.product.list', compact('products'));
        }
        return view('pages.web.product.main');
    }
    
    public function show(Product $product)
    {
        return view('pages.web.product.show', ['data' => $product]);
    }
}
