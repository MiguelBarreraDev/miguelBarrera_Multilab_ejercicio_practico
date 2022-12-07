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

        $orders = Order::with('patient', 'user')->get();

        return view('home.home', ['orders' => $orders]);
    }
}
