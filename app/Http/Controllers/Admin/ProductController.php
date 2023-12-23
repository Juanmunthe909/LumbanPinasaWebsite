<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('description', 'like', '%' . $request->keyword . '%')
                ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('price', 'like', '%' . $request->keyword . '%')
                ->orWhere('stock', 'like', '%' . $request->keyword . '%')
                ->orWhere('category', 'like', '%' . $request->keyword . '%')
                ->orWhere('address', 'like', '%' . $request->keyword . '%')
                ->paginate(10);
            return view('pages.admin.product.list', compact('product'));
        }
        return view('pages.admin.product.main');
    }

    public function create()
    {
        return view('pages.admin.product.input', ['data' => new Product]);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title'),
                ]);
            } elseif ($errors->has('category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            } elseif ($errors->has('address')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('address'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stock'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cover'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stock'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cover'),
                ]);
            }
        }

        $file = $request->file('cover');
        $filename = $file->getClientOriginalName();
        $file->move('images/panen', $filename);

        Product::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'phone' => $request->phone,
            'address' => $request->address,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover' => $filename,
        ]);

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menambahkan produk baru',
        ]);
    }

    public function show(Product $product)
    {
        return view('pages.admin.product.show', ['data' => $product]);
    }

    public function edit(Product $product)
    {
        return view('pages.admin.product.input', ['data' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:products,title,' . $product->id,
            'category' => 'required',
            'description' => 'required|string',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title'),
                ]);
            } elseif ($errors->has('category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            } elseif ($errors->has('address')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('address'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stock'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cover'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stock'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'alert' => 'error',
                ]);
            }
        }

        $file = $request->file('cover');
        $filename = $file->getClientOriginalName();
        $file->move('images/panen', $filename);

        $product->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'phone' => $request->phone,
            'address' => $request->address,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover' => $filename,

        ]);

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil merubah produk',
        ]);
    }

    public function destroy(Product $product)
    {
        $file = public_path('images/panen/' . $product->cover);
        if (file_exists($file)) {
            unlink($file);
        }

        $product->delete();

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menghapus produk',
        ]);
    }
}
