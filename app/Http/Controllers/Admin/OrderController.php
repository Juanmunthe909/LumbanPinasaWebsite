<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.*', 'users.name')
                ->where('orders.status', 'like', '%' . $request->keyword . '%')
                ->orWhere('users.name', 'like', '%' . $request->keyword . '%')
                ->orWhere('orders.created_at', 'like', '%' . $request->keyword . '%')
                ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('address', 'like', '%' . $request->keyword . '%')
                ->orWhere('orders.total', 'like', '%' . $request->keyword . '%')
                ->orWhere('postal_code', 'like', '%' . $request->keyword . '%')
                ->paginate(10);
            return view('pages.admin.orders.list', compact('orders'));
        }
        return view('pages.admin.orders.main');
    }

    public function show(Order $order)
    {
        return view('pages.admin.orders.show', compact('order'));
    }

    public function accept(Order $order)
    {
        $order->status = 'accepted';
        $order->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil diterima',
        ]);
    }

    public function reject(Order $order)
    {
        $order->status = 'rejected';
        $order->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil ditolak',
        ]);
    }
}
