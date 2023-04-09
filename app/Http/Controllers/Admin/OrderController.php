<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('payment_status', 'paid')->orderBy('id', 'desc')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function getOrderDetails($orderNumber) {
        $order = Order::with(['user', 'course'])->where('order_number', $orderNumber)->first();

        $order_details = view('admin.orders.include.order_details', compact('order'))->render();

        return response()->json([
            'order_details' => $order_details
        ]);
    }
}
