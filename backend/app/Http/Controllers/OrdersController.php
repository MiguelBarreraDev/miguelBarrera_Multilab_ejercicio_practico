<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class Helper
{
    public static function generateUniqueCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 6;

        $code = '';

        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        if (Order::where('code', $code)->exists()) {
            return Helper::generateUniqueCode();
        }

        return $code;
    }
}

class OrdersController extends Controller
{
    /**
     * Display orders
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        if (!empty($orders)) {
            $orders->load('user', 'patient');
        }

        return response($orders, 200);
    }

    /**
     * Store order
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->code = Helper::generateUniqueCode();
        $order->patient_id = $request->patient_id;
        if (isset($request->doctor_id)) {
            $order->doctor_id = $request->doctor_id;
        }
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect('/home')->with('success', 'Orden creada con exito');
    }
}
