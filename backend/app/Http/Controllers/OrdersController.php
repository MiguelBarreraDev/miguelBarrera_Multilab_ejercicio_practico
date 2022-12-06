<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * Display orders
     */
    public function index()
    {
        $orders = Order::with('user', 'patient')->get();

        return response($orders, 200);
    }

    /**
     * Store order
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->code = $request->code;
        $order->patient_id = $request->patient_id;
        $order->user_id = Auth::user()->id;
        $order->save();

        return response($order, 200);
    }
}