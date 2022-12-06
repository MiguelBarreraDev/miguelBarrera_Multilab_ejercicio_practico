<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * Display orders
     */
    public function index()
    {
        $orders = Order::all();

        return response($orders, 200);
    }

    /**
     * Store order
     */
    public function store(Request $request)
    {
        $order = Order::create($request->only('code'));
        return $order;
    }
}