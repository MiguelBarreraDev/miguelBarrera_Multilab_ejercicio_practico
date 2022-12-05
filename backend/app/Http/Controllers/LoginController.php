<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show () {
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('auth.login.login');
    }

    public function login (LoginRequest $request) {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) {
            return redirect('/login')->withErrors('Por favor verifique su correo y contraseña');
        }
    
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return redirect('/home');
    }
 }