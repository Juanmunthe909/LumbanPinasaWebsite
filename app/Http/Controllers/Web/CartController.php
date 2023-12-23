<?php

namespace App\Http\Controllers\Web;;

use App\Models\Cart;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function notif()
    {
        $subtotal = 0;
        $total = 0;
        $output = '';
        $cart = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
        if ($cart->count() > 0) {
            $subtotal = 0;
            $total = 0;

            foreach ($cart as $c) {
                $subtotal = $c->product->price * $c->quantity;
                $output .=
                    '<div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                    <div class="d-flex align-items-center">
                        <img src="' . asset('images/panen/' . $c->product->cover) . '" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                        <div class="flex-1">
                            <h6 class="mt-0 mb-1 fs-14">
                                <a href="javascript" class="text-reset">' . $c->product->name . '</a>
                            </h6>
                            <p class="mb-0 fs-12 text-muted">
                                Quantity: <span>' . $c->quantity . ' x ' . $c->product->price . '</span>
                            </p>
                        </div>
                        <div class="px-2">
                            <h5 class="m-0 fw-normal">Rp. <span class="cart-item-price">' . number_format($subtotal) . '</span></h5>
                        </div>
                        <div class="ps-2">
                            <a href="javascript:;" onclick="remove_cart(\'Apakah Anda Yakin?\' , \'Yakin\',\'Tidak\' , \'DELETE\' , \'' . route('web.cart.delete', $c->id) . '\');" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></a>
                        </div>
                    </div>
                </div>';
                $total = $total + $subtotal;
            }
        } else {
            $output .=
                '<div class="text-center empty-cart" id="empty-cart" style="display: none;">
                <div class="avatar-md mx-auto my-3">
                    <div class="avatar-title bg-soft-info text-info fs-36 rounded-circle">
                        <i class="bx bx-cart"></i>
                    </div>
                </div>
                <h5 class="mb-3">Your Cart is Empty!</h5>
                <a href="#" class="btn btn-success w-md mb-3">Shop Now</a>
            </div>';
        }
        return response()->json([
            'collection' => $output,
            'subtotal' => number_format($subtotal),
            'total' => number_format($total),
            'total_item' => $cart->count(),
        ]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $provinces = Province::all();
            $count = Cart::where('user_id', Auth::guard('web')->user()->id)->count();
            $carts = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
            return view('pages.web.cart.list', compact('carts', 'count', 'provinces'));
        }
        return view('pages.web.cart.main');
    }

    public function store(Request $request)
    {
        $cart = Cart::where('user_id', Auth::guard('web')->user()->id)->where('product_id', $request->product_id)->first();
        $product = \App\Models\Product::find($request->product_id);
        if($product->stock < $request->quantity){
            return response()->json([
                'alert' => 'error',
                'message' => 'Jumlah produk melebihi stok',
            ]);
        }
        if ($cart) {
            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();
        } else {
            $cart = new Cart();
            $cart->user_id = Auth::guard('web')->user()->id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->save();
        }

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menambahkan ke keranjang',
        ]);
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required',
        ]);
        if ($cart->quantity < $cart->product->stock) {
            $cart->quantity = $request->quantity;
            $cart->save();
            return response()->json([
                'quantity' => $cart->quantity,
                'subtotal' => number_format($request->quantity * $cart->product->price),
            ]);
        } else {
            return response()->json([
                'quantity' => $cart->quantity,
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        }
    }

    public function increase(Cart $cart)
    {
        if ($cart->quantity < $cart->product->stock) {
            $cart->quantity = $cart->quantity + 1;
            $cart->update();
            return response()->json([
                'quantity' => $cart->quantity,
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        } else {
            return response()->json([
                'quantity' => $cart->quantity,
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        }
    }

    public function decrease(Cart $cart)
    {
        if ($cart->quantity > 1) {
            $cart->quantity = $cart->quantity - 1;
            $cart->update();
            return response()->json([
                'quantity' => $cart->quantity,
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        } else {
            return response()->json([
                'quantity' => $cart->quantity,
                'subtotal' => number_format($cart->quantity * $cart->product->price),
            ]);
        }
    }
    public function destroy(Cart $cart)
    {
        $cart->delete();
        $count = Cart::where('user_id', Auth::guard('web')->user()->id)->count();
        return response()->json([
            'alert' => 'success',
            'total_item' => $count,
            'message' => 'Berhasil menghapus dari keranjang',
        ]);
    }
}
