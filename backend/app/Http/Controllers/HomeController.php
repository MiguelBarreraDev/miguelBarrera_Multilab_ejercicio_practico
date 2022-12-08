<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function show () {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $orders = Order::where('user_id', Auth::user()->id)->paginate(5);

        if (isset($orders)) {
            $orders->load('user', 'patient');
        }

        $patients = Patient::all();

        $doctors = Doctor::all();

        return view('home.home', [
            'orders' => $orders,
            'patients' => $patients,
            'doctors' => $doctors
        ]);
    }
}
