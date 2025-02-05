<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('inicio');
        }
        $error = 'Usuario o contraseña incorrectos';
        return redirect()->route('loginform', compact('error'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('inicio');
    }
}
