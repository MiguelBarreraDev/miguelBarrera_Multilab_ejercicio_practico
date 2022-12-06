<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Models\User;

class SignupController extends Controller
{
    /**
     * Crear un nuevo usuario.
     * 
     * @param SignupRequest $request
     */
    public function store (SignupRequest $request) {
        $user = User::create($request->validated());
    }
}
