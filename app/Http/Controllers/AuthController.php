<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // sementara dummy login
        if ($request->email == "admin@gmail.com" && $request->password == "123") {
            return "Login Berhasil";
        }

        return back()->with('error', 'Email atau password salah');
    }
}