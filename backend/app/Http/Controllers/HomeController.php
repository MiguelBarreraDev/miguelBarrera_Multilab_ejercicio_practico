<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class HomeController extends Controller
{
    public function show () {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $orders = Order::where('user_id', Auth::user()->id)->get();

        if (isset($orders)) {
            $orders->load('user', 'patient');
        }

        return view('home.home', ['orders' => $orders]);
    }
}
